<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryForumRequest;
use MedianetDev\Forum\Models\Category;

class CategoryForumsController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax() or $request->debug) {
            return $this->datatables($request);
        }

        return view('back.category_forums.index');
    }

    public function datatables(Request $request)
    {
        $categories = Category::get();

        return datatables()->of($categories)
            ->editColumn('id',
                '<a href="{{route(\'back.category_forums.show\', ["id" => $id])}}">{{$id}}</a>')
            ->addColumn('actions', function ($model) {
                return getShowButtonAttribute($model->id, 'category_forums') . getEditButtonAttribute($model->id, 'category_forums') . getDeleteButtonAttribute($model->id, 'category_forums');
            })
            ->rawColumns(['id', 'is_active', 'category', 'actions'])
            ->make(true);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $categories = Category::get();

        return view('back.category_forums.create', compact('categories'));
    }

    /**
     * @param \App\Http\Requests\CategoryForumRequest $request
     * @return  \Illuminate\Http\Response
     */
    public function store(CategoryForumRequest $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->slug = \Str::slug($request->name);
        $category->color = $request->color;
        $category->order = $request->order;
        $category->parent_id = $request->parent_id ?? null;
        $category->save();

        return redirect()->route('back.category_forums.show', $category->id)
            ->with('success', trans('og.alert.success'));
    }

    /**
     * @return  \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::findOrFail($id);

        return view('back.category_forums.show', compact('category'));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $categories = Category::get();

        return view('back.category_forums.edit', compact('category', 'categories'));
    }

    /**
     * @param \App\Http\Requests\CategoryForumRequest $request
     * @param int $id
     * @return  \Illuminate\Http\Response
     */
    public function update(CategoryForumRequest $request, $id)
    {
        $category = Category::findOrFail($id);

        $category->name = $request->name;
        $category->slug = \Str::slug($request->name);
        $category->color = $request->color;
        $category->order = $request->order;
        $category->parent_id = $request->parent_id ?? null;
        $category->save();

        return redirect()->route('back.category_forums.show', $category->id)
            ->with('success', trans('og.alert.success'));
    }

    /**
     * @param int $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        $menu_id = $category->menu_id;

        $category->delete();

        return redirect()->route('back.category_forums.index', ['menu_id' => $menu_id])->with('success',
            trans('og.alert.success'));
    }
}
