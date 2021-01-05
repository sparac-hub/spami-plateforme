<?php

namespace App\Http\Controllers\Back;

use App\Models\Cms\MediaAlbum;
use App\Models\Cms\MediaFile;
use Illuminate\Http\Request;
use App\Models\Cms\MediaFileCategory;
use App\Http\Requests\MediaFileRequest;
use App\Http\Controllers\Controller;

class MediaFilesController extends Controller
{
    protected $mainModel = 'App\Models\Cms\MediaFile';

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

        return view('back.media_files.index', compact('menu_id'));
    }

    public function datatables(Request $request)
    {
        $where = $request->menu_id ? [(new MediaFile())->getTable() . '.menu_id' => $request->menu_id] : [];

        $media_files = MediaFile::withTranslation()
            ->where($where)
            ->select((new MediaFile)->getTable() . '.*');

        return datatables()->of($media_files)
            ->editColumn('id',
                '<a href="{{route(\'back.media_files.show\', ["id" => $id])}}">{{$id}}</a>')
            ->addColumn('name', function ($model) {
                return $model->translations->first()->name ?? null;
            })
            ->addColumn('start_date', function ($model) {
                return $model->first()->start_date ? date('d-m-Y', strtotime($model->start_date)) : null;
            })
            ->addColumn('end_date', function ($model) {
                return $model->first()->end_date ? date('d-m-Y', strtotime($model->end_date)) : null;
            })
            ->addColumn('description', function ($model) {
                return $model->translations->first()->description ?? null;
            })
            ->addColumn('content', function ($model) {
                return $model->translations->first()->content ?? null;
            })
            ->addColumn('actions', function ($model) {
                return $model->enable_button . ' ' . $model->show_button . ' ' . $model->edit_button . ' ' . $model->delete_button;
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

        $media_albums = MediaAlbum::getSelectOptionsForMenu($menu_id);

        return view('back.media_files.create', compact('media_albums', 'menu_id'));
    }

    /**
     * @param \App\Http\Requests\MediaFileRequest $request
     * @return  \Illuminate\Http\Response
     */
    public function store(MediaFileRequest $request)
    {
        $data = $request->all();

        if ($data['type'] == MediaFile::IMAGE) {
            $data['url'] = $request->image_filepath;
        } else {
            $data['url'] = $request->video_filepath;
        }

        $media_file = MediaFile::create($data);

        return redirect()->route('back.media_files.show', $media_file->id)
            ->with('success', trans('og.alert.success'));
    }

    /**
     * @return  \Illuminate\Http\Response
     */
    public function show($id)
    {
        $media_file = MediaFile::withTranslation()
            ->with([
                'menu' => function ($query) {
                    $query->withTranslation();
                },
            ])->findOrFail($id);

        return view('back.media_files.show', compact('media_file'));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $media_file = MediaFile::with('album', 'media')->findOrFail($id);

        $media_albums = MediaAlbum::where(['menu_id' => $media_file->menu_id, 'is_active' => 1])->get();

        return view('back.media_files.edit', compact('media_file', 'media_albums'));
    }

    /**
     * @param \App\Http\Requests\MediaFileRequest $request
     * @param int $id
     * @return  \Illuminate\Http\Response
     */
    public function update(MediaFileRequest $request, $id)
    {
        $data = $request->all();

        if ($data['type'] == MediaFile::IMAGE) {
            $data['url'] = $request->image_filepath;
        } elseif ($data['type'] == MediaFile::VIDEO) {
            $data['url'] = $request->video_filepath;
        }

        $media_file = MediaFile::with('media')->find($id);
        $media_file->update($data);

        return redirect()->route('back.media_files.show', $media_file->id)->with('success',
            trans('og.alert.success'));
    }

    /**
     * @param int $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $media_file = MediaFile::findOrFail($id);

        $menu_id = $media_file->menu_id;

        $media_file->delete();

        return redirect()->route('back.media_files.index', ['menu_id' => $menu_id])->with('success',
            trans('og.alert.success'));
    }
}
