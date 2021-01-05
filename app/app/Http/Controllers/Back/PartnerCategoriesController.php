<?php

namespace App\Http\Controllers\Back;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\Cms\PartnerCategory;
use App\Http\Controllers\Controller;

class PartnerCategoriesController extends Controller
{
    protected $mainModel = 'App\Models\Cms\PartnerCategory';

    /**
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

        return view('back.partner_categories.index', compact('menu_id'));
    }

    /**/

    public function datatables(Request $request)
    {
        $where = $request->menu_id ? ['menu_id' => $request->menu_id] : [];

        $partner_categories = PartnerCategory::withTranslation()
            ->where($where)
            ->select((new PartnerCategory())->getTable() . '.*');

        return datatables()->of($partner_categories)
            ->editColumn('id',
                '<a href="{{route(\'back.partner_categories.show\', ["id" => $id])}}">{{$id}}</a>')
            ->editColumn('is_active', function ($faq_item) {
                return $faq_item->is_active ? '<span class="label label-success">Active</span>' : '<span class="label label-danger">Inactive</span>';
            })
            ->addColumn('title', function ($model) {
                return $model->translations->first()->title ?? null;
            })
            ->addColumn('description', function ($model) {
                return $model->translations->first()->description ?? null;
            })
            ->addColumn('slug', function ($model) {
                return $model->translations->first()->slug ?? null;
            })
            ->addColumn('actions', function ($model) {
                return $model->enable_button . ' ' . $model->show_button . ' ' . $model->edit_button . ' ' . $model->delete_button;
            })
            ->rawColumns(['id', 'is_active', 'actions'])
            ->make(true);
    }

    public function create(Request $request)
    {
        $menu_id = $this->getMenuIdOrFail($request);

        return view('back.partner_categories.create', compact('menu_id'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Requests\PartnerCategoryRequest $request)
    {
        $partner_category = PartnerCategory::create($request->all());

        return redirect()->route('back.partner_categories.show',
            $partner_category->id)->with('success', trans('og.alert.success'));
    }

    /**
     * @return  \Illuminate\Http\Response
     */
    public function show(PartnerCategory $partner_category)
    {
        return view('back.partner_categories.show', compact('partner_category'));
    }

    /**
     * @return  \Illuminate\Http\Response
     */
    public function edit(PartnerCategory $partner_category)
    {
        return view('back.partner_categories.edit', compact('partner_category'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return  \Illuminate\Http\Response
     */
    public function update(Requests\PartnerCategoryRequest $request, $id)
    {
        $data = $request->all();
        $partner_category = PartnerCategory::find($id);
        $partner_category->update($data);

        return redirect()->route('back.partner_categories.show',
            $partner_category->id)->with('success', trans('og.alert.success'));
    }

    /**
     * @param int $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $partner_category = PartnerCategory::findOrFail($id);
        $menu_id = $partner_category->menu_id;
        $partner_category->delete();

        return redirect()->route('back.partner_categories.index', ['menu_id' => $menu_id])->with('success',
            trans('og.alert.success'));
    }
}
