<?php

namespace App\Http\Controllers\Back;

use App\Http\Requests;
use App\Http\Requests\FileRequest;
use App\Models\Cms\File;
use Illuminate\Http\Request;
use App\Models\Cms\FileCategory;
use App\Http\Controllers\Controller;

class FilesController extends Controller
{
    protected $mainModel = 'App\Models\Cms\File';

    /**
     * @return  Response
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

        return view('back.files.index', compact('menu_id'));
    }

    public function datatables(Request $request)
    {

        $where = $request->menu_id ? [(new File())->getTable() . '.menu_id' => $request->menu_id] : [];

        $files = File::withTranslation()
            ->with('category')
            ->where($where)
            ->select((new File)->getTable() . '.*');


        return datatables()->of($files)
            ->editColumn('id',
                '<a href="{{route(\'back.files.show\', ["id" => $id])}}">{{$id}}</a>')
            ->addColumn('category', function ($model) {
                return isset($model->category->name) ?
                    '<a href="' . route('back.file_categories.show',
                        $model->file_category_id) . '">' . $model->category->name . '</a>' :
                    null;
            })
            ->addColumn('actions', function ($model) {
                return $model->enable_button . ' ' . $model->show_button . ' ' . $model->edit_button . ' ' . $model->delete_button;
            })
            ->rawColumns(['id', 'category', 'actions'])
            ->make(true);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return  \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $menu_id = $this->getMenuIdOrFail($request);

        $file_categories = FileCategory::whereMenuId($request->menu_id)->get();

        return view('back.files.create', compact('file_categories', 'menu_id'));
    }

    /**
     * @param \App\Http\Requests\FileRequest $request
     * @return  \Illuminate\Http\Response
     */
    public function store(FileRequest $request)
    {
        $file = File::create($request->all());

        $file->addMediaFromRequest('file')
            ->toMediaCollection();

        return redirect()->route('back.files.show', $file->id)->with('success',
            trans('og.alert.success'));
    }

    /**
     * @return  \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        return view('back.files.show', compact('file'));
    }

    /**
     * @return  \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $file = File::with('category', 'media')->findOrFail($id);

        $file_categories = FileCategory::whereMenuId($file->menu_id)->get();

        return view('back.files.edit', compact('file', 'file_categories'));
    }

    /**
     * @param \App\Http\Requests\FileRequest $request
     * @param int $id
     * @return  \Illuminate\Http\Response
     */
    public function update(FileRequest $request, $id)
    {
        $data = $request->all();
        $file = File::with('media')->find($id);
        $file->update($data);

        if ($request->hasFile('file')) {
            if ($media = $file->media->first()) {
                $media->delete();
            }
            $file->addMediaFromRequest('file')->toMediaCollection();
        }

        return redirect()->route('back.files.show', $file->id)->with('success',
            trans('og.alert.success'));
    }

    /**
     * @param int $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file = File::findOrFail($id);

        $menu_id = $file->menu_id;

        $file->delete();

        return redirect()->route('back.files.index', ['menu_id' => $menu_id])->with('success',
            trans('og.alert.success'));
    }
}
