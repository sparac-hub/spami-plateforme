<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Models\Cms\UsefulLink;
use App\Http\Controllers\Controller;
use App\Models\Cms\UsefulLinkCategory;
use App\Http\Requests\UsefulLinkRequest;

class UsefulLinksController extends Controller
{
    protected $mainModel = 'App\Models\Cms\UsefulLink';

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

        return view('back.useful_links.index', compact('menu_id'));
    }

    public function datatables(Request $request)
    {
        $where = $request->menu_id ? ['menu_id' => $request->menu_id] : [];

        $useful_links = UsefulLink::with([
            'category.translations' => function ($query) {
                $query->whereLocale(locale());
            },
        ])->withTranslation()
            ->where($where)->select((new UsefulLink())->getTable() . '.*');

        return datatables()->of($useful_links)
            ->editColumn('id',
                '<a href="{{route(\'back.useful_links.show\', ["id" => $id])}}">{{$id}}</a>')
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

        $useful_link_categories = UsefulLinkCategory::getSelectOptionsForMenu($menu_id);

        return view('back.useful_links.create', compact('useful_link_categories', 'menu_id'));
    }

    /**
     * @param \App\Http\Requests\UsefulLinkRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsefulLinkRequest $request)
    {
        $useful_link = UsefulLink::create($request->prepared());

        return redirect()->route('back.useful_links.show', $useful_link->id)
            ->with('success', trans('og.alert.success'));
    }

    /**
     * @return  \Illuminate\Http\Response
     */
    public function show(UsefulLink $useful_link)
    {
        return view('back.useful_links.show', compact('useful_link'));
    }

    /**
     * @return  \Illuminate\Http\Response
     */
    public function edit(UsefulLink $useful_link)
    {
        $useful_link_categories = UsefulLinkCategory::getSelectOptionsForMenu($useful_link->menu_id);

        return view('back.useful_links.edit', compact('useful_link', 'useful_link_categories'));
    }

    /**
     * @param \App\Http\Requests\UsefulLinkRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsefulLinkRequest $request, $id)
    {
        $useful_link = UsefulLink::findOrFail($id);

        $data = $request->all();
        if ($data['image'] == null) {
            $data['image'] = $useful_link->image;
        }

        $useful_link->update($data);

        return redirect()->route('back.useful_links.show', $useful_link->id)
            ->with('success', trans('og.alert.success'));
    }

    /**
     * @param int $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $useful_link = UsefulLink::findOrFail($id);
        $menu_id = $useful_link->menu_id;
        $useful_link->delete();

        return redirect()->route('back.useful_links.index', ['menu_id' => $menu_id])->with('success',
            trans('og.alert.success'));
    }
}
