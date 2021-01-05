<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Models\Cms\AspimCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\AspimCategoryRequest;

class AspimCategoriesController extends Controller
{
    protected $mainModel = 'App\Models\Cms\AspimCategory';

    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
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

        return view('back.aspim_categories.index', compact('menu_id'));
    }

    public function datatables(Request $request)
    {
        $where = $request->menu_id ? [(new AspimCategory())->getTable() . '.menu_id' => $request->menu_id] : [];

        $aspim_categories = AspimCategory::withTranslation()
            ->where($where)
            ->select((new AspimCategory())->getTable() . '.*');

        return datatables()->of($aspim_categories)
            ->editColumn('id',
                '<a href="{{route(\'back.aspim_categories.show\', ["id" => $id])}}">{{$id}}</a>')
            ->addColumn('slug', function ($model) {
                return $model->translations->first()->slug ?? null;
            })
            ->addColumn('name', function ($model) {
                return $model->translations->first()->name ?? null;
            })
            ->addColumn('description', function ($model) {
                return $model->translations->first()->description ?? null;
            })
            ->addColumn('actions', function ($model) {
                return $model->enable_button . ' ' . $model->show_button . ' ' . $model->edit_button . ' ' . $model->delete_button;
            })->rawColumns(['id', 'is_active', 'actions'])
            ->make(true);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $menu_id = $this->getMenuIdOrFail($request);

        return view('back.aspim_categories.create', compact('menu_id'));
    }

    /**
     * @param \App\Http\Requests\AspimCategoryRequest $request
     * @return  \Illuminate\Http\Response
     */
    public function store(AspimCategoryRequest $request)
    {
        $aspim_category = AspimCategory::create($request->prepared());

        return redirect()->route('back.aspim_categories.show',
            $aspim_category->id)->with('success', trans('og.alert.success'));
    }

    /**
     * @param int $id
     * @return  Response
     */
    public function show($id)
    {
        $aspim_category = AspimCategory::withTranslation()
            ->with([
                'menu' => function ($query) {
                    $query->withTranslation();
                },
            ])->findOrFail($id);

        return view('back.aspim_categories.show', compact('aspim_category'));
    }

    /**
     * @param AspimCategory $aspim_category
     * @return \Illuminate\Http\Response
     */
    public function edit(AspimCategory $aspim_category)
    {
        return view('back.aspim_categories.edit', compact('aspim_category'));
    }

    /**
     * @param \App\Http\Requests\AspimCategoryRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(AspimCategoryRequest $request, $id)
    {
        $aspim_category = AspimCategory::findOrFail($id);

        $aspim_category->update($request->prepared());

        return redirect()->route('back.aspim_categories.show',
            $aspim_category->id)->with('success', trans('og.alert.success'));
    }

    /**
     * @param int $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $aspim_category = AspimCategory::findOrFail($id);
        $menu_id = $aspim_category->menu_id;

        $aspim_category->delete();

        return redirect()->route('back.aspim_categories.index', ['menu_id' => $menu_id])->with('success',
            trans('og.alert.success'));
    }
}
