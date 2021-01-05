<?php

namespace App\Http\Controllers\Back;

use App\Models\Cms\MediaAlbumCategory;
use Illuminate\Http\Request;
use App\Models\Cms\MediaAlbum;
use App\Http\Controllers\Controller;
use App\Http\Requests\MediaAlbumRequest;

class MediaAlbumsController extends Controller
{
    protected $mainModel = 'App\Models\Cms\MediaAlbum';

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

        return view('back.media_albums.index', compact('menu_id'));
    }

    public function datatables(Request $request)
    {
        $where = $request->menu_id ? [(new MediaAlbum())->getTable() . '.menu_id' => $request->menu_id] : [];

        $media_albums = MediaAlbum::withTranslation()
            ->where($where)
            ->select((new MediaAlbum())->getTable() . '.*');

        return datatables()->of($media_albums)
            ->editColumn('id',
                '<a href="{{route(\'back.media_albums.show\', ["id" => $id])}}">{{$id}}</a>')
            ->addColumn('category', function ($model) {
                if ($model->media_album_category_id) {
                    return '<a href="' . route("back.media_album_categories.show",
                            $model->media_album_category_id) . '">' . $model->category->name . '</a>';
                }
            })
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
            })
            ->rawColumns(['id', 'is_active', 'actions', 'category'])
            ->make(true);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $menu_id = $this->getMenuIdOrFail($request);

        $media_album_categories = MediaAlbumCategory::getSelectOptionsForMenu($menu_id);

        return view('back.media_albums.create', compact('menu_id', 'media_album_categories'));
    }

    /**
     * @param \App\Http\Requests\MediaAlbumRequest $request
     * @return  \Illuminate\Http\Response
     */
    public function store(MediaAlbumRequest $request)
    {
        $media_album = MediaAlbum::create($request->prepared());

        return redirect()->route('back.media_albums.show',
            $media_album->id)->with('success', trans('og.alert.success'));
    }

    /**
     * @param int $id
     * @return  Response
     */
    public function show($id)
    {
        $media_album = MediaAlbum::withTranslation()
            ->with([
                'menu' => function ($query) {
                    $query->withTranslation();
                },
            ])->findOrFail($id);

        return view('back.media_albums.show', compact('media_album'));
    }

    /**
     * @param MediaAlbum $media_album
     * @return \Illuminate\Http\Response
     */
    public function edit(MediaAlbum $media_album)
    {
        $media_album_categories = MediaAlbumCategory::getSelectOptionsForMenu($media_album->menu_id);

        return view('back.media_albums.edit', compact('media_album', 'media_album_categories'));
    }

    /**
     * @param \App\Http\Requests\MediaAlbumRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(MediaAlbumRequest $request, $id)
    {
        $media_album = MediaAlbum::findOrFail($id);

        $media_album->update($request->prepared());

        return redirect()->route('back.media_albums.show',
            $media_album->id)->with('success', trans('og.alert.success'));
    }

    /**
     * @param int $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $media_album = MediaAlbum::findOrFail($id);
        $menu_id = $media_album->menu_id;

        $media_album->delete();

        return redirect()->route('back.media_albums.index', ['menu_id' => $menu_id])->with('success',
            trans('og.alert.success'));
    }
}
