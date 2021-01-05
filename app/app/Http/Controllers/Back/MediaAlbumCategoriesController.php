<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Models\Cms\MediaAlbumCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\MediaAlbumCategoryRequest;

class MediaAlbumCategoriesController extends Controller
{
    protected $mainModel = 'App\Models\Cms\MediaAlbumCategory';

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

        return view('back.media_album_categories.index', compact('menu_id'));
    }

    public function datatables(Request $request)
    {
        $where = $request->menu_id ? [(new MediaAlbumCategory())->getTable() . '.menu_id' => $request->menu_id] : [];

        $media_album_categories = MediaAlbumCategory::withTranslation()
            ->where($where)
            ->select((new MediaAlbumCategory())->getTable() . '.*');

        return datatables()->of($media_album_categories)
            ->editColumn('id',
                '<a href="{{route(\'back.media_album_categories.show\', ["id" => $id])}}">{{$id}}</a>')
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

        return view('back.media_album_categories.create', compact('menu_id'));
    }

    /**
     * @param \App\Http\Requests\MediaAlbumCategoryRequest $request
     * @return  \Illuminate\Http\Response
     */
    public function store(MediaAlbumCategoryRequest $request)
    {
        $media_album_category = MediaAlbumCategory::create($request->prepared());

        return redirect()->route('back.media_album_categories.show',
            $media_album_category->id)->with('success', trans('og.alert.success'));
    }

    /**
     * @param int $id
     * @return  Response
     */
    public function show($id)
    {
        $media_album_category = MediaAlbumCategory::withTranslation()
            ->with([
                'menu' => function ($query) {
                    $query->withTranslation();
                },
            ])->findOrFail($id);

        return view('back.media_album_categories.show', compact('media_album_category'));
    }

    /**
     * @param MediaAlbumCategory $media_album_category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $media_album_category = MediaAlbumCategory::findOrFail($id);

        return view('back.media_album_categories.edit', compact('media_album_category'));
    }

    /**
     * @param \App\Http\Requests\MediaAlbumCategoryRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(MediaAlbumCategoryRequest $request, $id)
    {
        $media_album_category = MediaAlbumCategory::findOrFail($id);

        $media_album_category->update($request->prepared());

        return redirect()->route('back.media_album_categories.show',
            $media_album_category->id)->with('success', trans('og.alert.success'));
    }

    /**
     * @param int $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $media_album_category = MediaAlbumCategory::findOrFail($id);
        $menu_id = $media_album_category->menu_id;

        $media_album_category->delete();

        return redirect()->route('back.media_album_categories.index', ['menu_id' => $menu_id])->with('success',
            trans('og.alert.success'));
    }
}
