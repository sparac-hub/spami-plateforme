<?php

namespace App\Http\Controllers\Back;

use App\Http\Requests;
use App\Models\Cms\PostCategory;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PostCategoriesController extends Controller
{
    protected $mainModel = 'App\Models\Cms\PostCategory';

    /**
     * @return  Response
     */
    public function index()
    {
        return view('back.post_categories.index');
    }

    /**
     * @return  Response
     */
    public function create()
    {
        return view('back.post_categories.create');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return  Response
     */
    public function store(Request $request)
    {
        $post_category = PostCategory::create($request->all());

        return redirect()->route('back.post_categories.show', $post_category->id)
            ->with('success', trans('og.alert.success'));
    }

    /**
     * @param int $id
     * @return  Response
     */
    public function show($id)
    {
        $post_category = PostCategory::findOrFail($id);

        return view('back.post_categories.show', compact('post_category'));
    }

    /**
     * @param int $id
     * @return  Response
     */
    public function edit($id)
    {
        $post_category = PostCategory::findOrFail($id);

        return view('back.post_categories.edit', compact('post_category'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return  Response
     */
    public function update(Request $request, $id)
    {
        $post_category = PostCategory::findOrFail($id);

        $post_category->update($request->all());

        return redirect()->route('back.post_categories.show', $post_category->id)
            ->with('success', trans('og.alert.success'));
    }

    /**
     * @param int $id
     * @return  Response
     */
    public function destroy($id, Request $request)
    {
        $post_category = PostCategory::findOrFail($id);

        $post_category->delete();

        return redirect()->route('back.post_categories.index')
            ->with('success', trans('og.alert.success'));
    }

    public function datatables()
    {
        $post_categories = PostCategory::all();

        return datatables()->of($post_categories)
            ->editColumn('id',
                '<a href="{{route(\'back.post_categories.show\', ["id" => $id])}}">{{$id}}</a>')
            ->editColumn('is_active', function ($post_category) {
                return $post_category->is_active ? '<span class="label label-success">Active</span>' : '<span class="label label-danger">Inactive</span>';
            })
            ->addColumn('actions', function ($model) {
                return $model->enable_button . ' ' . $model->show_button . ' ' . $model->edit_button . ' ' . $model->delete_button;
            })->rawColumns(['id', 'is_active', 'actions'])
            ->make(true);
    }
}
