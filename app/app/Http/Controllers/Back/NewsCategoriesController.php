<?php

namespace App\Http\Controllers\Back;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\Cms\NewsCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\NewsCategoryRequest;

class NewsCategoriesController extends Controller
{
    protected $mainModel = 'App\Models\Cms\NewsCategory';

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

        return view('back.news_categories.index', compact('menu_id'));
    }

    public function datatables(Request $request)
    {
        $where = $request->menu_id ? [(new NewsCategory())->getTable() . '.menu_id' => $request->menu_id] : [];

        $news_categories = NewsCategory::withTranslation()
            ->where($where)
            ->select((new NewsCategory())->getTable() . '.*');

        return datatables()->of($news_categories)
            ->editColumn('id',
                '<a href="{{route(\'back.news_categories.show\', ["id" => $id])}}">{{$id}}</a>')
            ->addColumn('slug', function ($model) {
                return $model->translations->first()->slug ?? null;
            })
            ->addColumn('name', function ($model) {
                return $model->translations->first()->name ?? null;
            })
            ->addColumn('description', function ($model) {
                return $model->translations->first()->description ?? null;
            })
            ->editColumn('is_active', function ($faq_item) {
                return $faq_item->is_active ? '<span class="label label-success">Active</span>' : '<span class="label label-danger">Inactive</span>';
            })
            ->addColumn('actions', function ($model) {
                return $model->enable_button . ' ' . $model->show_button .
                    ' ' . $model->edit_button . ' ' . $model->delete_button;
            })
            ->rawColumns(['id', 'is_active', 'actions'])
            ->make(true);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $menu_id = $this->getMenuIdOrFail($request);

        return view('back.news_categories.create', compact('menu_id'));
    }

    /**
     * @param \App\Http\Requests\NewsCategoryRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsCategoryRequest $request)
    {
        $news_category = NewsCategory::create($request->all());

        return redirect()->route('back.news_categories.show',
            $news_category->id)->with('success', trans('og.alert.success'));
    }

    /**
     * @param int $id
     * @return  Response
     */
    public function show($id)
    {
        $news_category = NewsCategory::withTranslation()
            ->with([
                'menu' => function ($query) {
                    $query->withTranslation();
                },
            ])->findOrFail($id);

        return view('back.news_categories.show', compact('news_category'));
    }

    /**
     * @param NewsCategory $news_category
     * @return \Illuminate\Http\Response
     */
    public function edit(NewsCategory $news_category)
    {
        return view('back.news_categories.edit', compact('news_category'));
    }

    /**
     * @param \App\Http\Requests\NewsCategoryRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(NewsCategoryRequest $request, $id)
    {
        $news_category = NewsCategory::findOrFail($id);

        $news_category->update($request->all());

        return redirect()->route('back.news_categories.show',
            $news_category->id)->with('success', trans('og.alert.success'));
    }

    /**
     * @param int $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news_category = NewsCategory::findOrFail($id);

        $menu_id = $news_category->menu_id;

        $news_category->delete();

        return redirect()->route('back.news_categories.index', ['menu_id' => $menu_id])
            ->with('success', trans('og.alert.success'));
    }
}
