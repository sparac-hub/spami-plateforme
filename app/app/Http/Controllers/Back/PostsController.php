<?php

namespace App\Http\Controllers\Back;

use App\Http\Requests;
use App\Models\Cms\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    protected $mainModel = 'App\Models\Cms\Post';

    /**
     * @return  Response
     */
    public function index()
    {
        return view('back.posts.index');
    }

    /**
     * @return  Response
     */
    public function create()
    {
        return view('back.posts.create');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return  Response
     */
    public function store(Request $request)
    {
        $post = Post::create($request->all());

        return redirect()->route('back.posts.show', $post->id)
            ->with('success', trans('og.alert.success'));
    }

    /**
     * @param int $id
     * @return  Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);

        return view('back.posts.show', compact('post'));
    }

    /**
     * @param int $id
     * @return  Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        return view('back.posts.edit', compact('post'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return  Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $post->update($request->all());

        return redirect()->route('back.posts.show', $post->id)
            ->with('success', trans('og.alert.success'));
    }

    /**
     * @param int $id
     * @return  Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        $post->delete();

        return redirect()->route('back.posts.index')
            ->with('success', trans('og.alert.success'));
    }

    public function datatables(Request $request)
    {
        $where = [];

        if ($request->post_category_id) {
            $where['post_category_id'] = $request->post_category_id;
        }

        $posts = Post::where($where)->get();

        return datatables()->of($posts)
            ->editColumn('id', '<a href="{{route(\'back.posts.show\', ["id" => $id])}}">{{$id}}</a>')
            ->editColumn('is_active', function ($post) {
                return $post->is_active ? '<span class="label label-success">Active</span>' : '<span class="label label-danger">Inactive</span>';
            })
            ->addColumn('actions', function ($model) {
                return $model->enable_button . ' ' . $model->show_button . ' ' . $model->edit_button . ' ' . $model->delete_button;
            })
            ->rawColumns(['id', 'is_active', 'actions'])
            ->make(true);
    }
}
