<?php

namespace App\Http\Controllers\Back;

use App\Http\Requests;
use App\Http\Requests\PartnerRequest;
use App\Models\Cms\Partner;
use Illuminate\Http\Request;
use App\Models\Cms\PartnerCategory;
use App\Http\Controllers\Controller;

class PartnersController extends Controller
{
    protected $mainModel = 'App\Models\Cms\Partner';

    /**
     * @param \Illuminate\Http\Request $request
     * @return  \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax() && $request->toggleStatus) {
            return $this->toggleStatus($request);
        }

        $menu_id = $this->getMenuIdOrFail($request);

        if ($request->ajax() or $request->debug) {
            return $this->datatables($request);
        }

        return view('back.partners.index', compact('menu_id'));
    }

    public function datatables(Request $request)
    {
        $where = $request->menu_id ? ['menu_id' => $request->menu_id] : [];

        $partner = Partner::with([
            'category.translations' => function ($query) {
                $query->whereLocale(locale());
            },
        ])->withTranslation()
            ->where($where)->select((new Partner())->getTable() . '.*');

        return datatables()->of($partner)
            ->editColumn('id',
                '<a href="{{route(\'back.partners.show\', ["id" => $id])}}">{{$id}}</a>')
            ->editColumn('is_active', function ($faq_item) {
                return $faq_item->is_active ? '<span class="label label-success">Active</span>' : '<span class="label label-danger">Inactive</span>';
            })
            ->addColumn('title', function ($model) {
                return $model->translations->first()->title ?? null;
            })
            ->addColumn('description', function ($model) {
                return $model->translations->first()->description ?? null;
            })
            ->addColumn('category', function ($model) {
                return $model->category->link ?? null;
            })
            ->addColumn('link', function ($model) {
                return $model->protocol . $model->url ?? null;
            })
            ->addColumn('actions', function ($model) {
                return $model->enable_button . ' ' . $model->show_button . ' ' . $model->edit_button . ' ' . $model->delete_button;
            })
            ->rawColumns(['id', 'category', 'is_active', 'actions'])
            ->make(true);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return  \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $menu_id = $this->getMenuIdOrFail($request);

        $partner_categories = PartnerCategory::getSelectOptionsForMenu($menu_id);

        return view('back.partners.create', compact('partner_categories', 'menu_id'));
    }

    /**
     * @param \App\Http\Requests\PartnerRequest $request
     * @return  \Illuminate\Http\Response
     */
    public function store(PartnerRequest $request)
    {
        $partner = Partner::create($request->all());

        forget_cache('partners');

        return redirect()->route('back.partners.show', $partner->id)
            ->with('success', trans('og.alert.success'));
    }

    /**
     * @return  \Illuminate\Http\Response
     */
    public function show(Partner $partner)
    {
        return view('back.partners.show', compact('partner'));
    }

    /**
     * @return  \Illuminate\Http\Response
     */
    public function edit(Partner $partner)
    {
        $partner_categories = PartnerCategory::getSelectOptionsForMenu($partner->menu_id);

        return view('back.partners.edit', compact('partner', 'partner_categories'));
    }

    /**
     * @param \App\Http\Requests\PartnerRequest $request
     * @param int $id
     * @return  \Illuminate\Http\Response
     */
    public function update(PartnerRequest $request, $id)
    {
        $partner = Partner::find($id);

        $data = $request->all();
        if ($data['image'] == null) {
            $data['image'] = $partner->image;
        }

        $partner->update($data);

        forget_cache('partners');

        return redirect()->route('back.partners.show', $partner->id)
            ->with('success', trans('og.alert.success'));
    }

    /**
     * @param int $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $partner = Partner::findOrFail($id);

        $menu_id = $partner->menu_id;

        $partner->delete();

        return redirect()->route('back.partners.index', ['menu_id' => $menu_id])
            ->with('success', trans('og.alert.success'));
    }
}
