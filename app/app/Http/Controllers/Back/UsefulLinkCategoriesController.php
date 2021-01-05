<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cms\UsefulLinkCategory;
use App\Http\Requests\UsefulLinkCategoryRequest;

class UsefulLinkCategoriesController extends Controller
{
    protected $mainModel = 'App\Models\Cms\UsefulLinkCategory';

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

        return view('back.useful_link_categories.index', compact('menu_id'));
    }

    /**/

    public function datatables(Request $request)
    {
        $where = $request->menu_id ? ['menu_id' => $request->menu_id] : [];

        $useful_link_categories = UsefulLinkCategory::withTranslation()
            ->where($where)
            ->select((new UsefulLinkCategory())->getTable() . '.*');

        return datatables()->of($useful_link_categories)
            ->editColumn('id',
                '<a href="{{route(\'back.useful_link_categories.show\', ["id" => $id])}}">{{$id}}</a>')
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

        return view('back.useful_link_categories.create', compact('menu_id'));
    }

    /**
     * @param \App\Http\Requests\UsefulLinkCategoryRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsefulLinkCategoryRequest $request)
    {
        $useful_link_category = UsefulLinkCategory::create($request->prepared());

        return redirect()->route('back.useful_link_categories.show', $useful_link_category->id)
            ->with('success', trans('og.alert.success'));
    }

    /**
     * @param \App\Models\Cms\UsefulLinkCategory $useful_link_category
     * @return  \Illuminate\Http\Response
     */
    public function show(UsefulLinkCategory $useful_link_category)
    {
        return view('back.useful_link_categories.show', compact('useful_link_category'));
    }

    /**
     * @param \App\Models\Cms\UsefulLinkCategory $useful_link_category
     * @return  \Illuminate\Http\Response
     */
    public function edit(UsefulLinkCategory $useful_link_category)
    {
        return view('back.useful_link_categories.edit', compact('useful_link_category'));
    }

    /**
     * @param \App\Http\Requests\UsefulLinkCategoryRequest $request
     * @param int $id
     * @return  \Illuminate\Http\Response
     */
    public function update(UsefulLinkCategoryRequest $request, $id)
    {
        $useful_link_category = UsefulLinkCategory::findOrFail($id);

        $useful_link_category->update($request->prepared());

        return redirect()->route('back.useful_link_categories.show', $useful_link_category->id)
            ->with('success', trans('og.alert.success'));
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $useful_link_category = UsefulLinkCategory::findOrFail($id);

        $menu_id = $useful_link_category->menu_id;

        $useful_link_category->delete();

        return redirect()->route('back.useful_link_categories.index', ['menu_id' => $menu_id])
            ->with('success', trans('og.alert.success'));
    }
}
