<?php

namespace App\Http\Controllers\Back;

use App\Http\Requests;
use App\Http\Requests\FileCategoryRequest;
use Illuminate\Http\Request;
use App\Models\Cms\FileCategory;
use App\Http\Controllers\Controller;

class FileCategoriesController extends Controller
{
    protected $mainModel = 'App\Models\Cms\FileCategory';

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

        return view('back.file_categories.index', compact('menu_id'));
    }

    public function datatables(Request $request)
    {
        $where = $request->menu_id ? ['menu_id' => $request->menu_id] : [];

        $file_categories = FileCategory::withTranslation()
            ->where($where)
            ->select((new FileCategory())->getTable() . '.*');

        return datatables()->of($file_categories)
            ->editColumn('id',
                '<a href="{{route(\'back.file_categories.show\', ["id" => $id])}}">{{$id}}</a>')
            ->addColumn('actions', function ($model) {
                return $model->enable_button . ' ' . $model->show_button . ' ' . $model->edit_button . ' ' . $model->delete_button;
            })
            ->rawColumns(['id', 'actions'])
            ->make(true);
    }

    /**
     * @return  Response
     */
    public function create(Request $request)
    {
        $menu_id = $this->getMenuIdOrFail($request);

        return view('back.file_categories.create', compact('menu_id'));
    }

    /**
     * @param \App\Http\Requests\FileCategoryRequest $request
     * @return mixed
     */
    public function store(FileCategoryRequest $request)
    {
        $file_category = FileCategory::create($request->all());

        return redirect()->route('back.file_categories.show', $file_category->id)
            ->with('success', trans('og.alert.success'));
    }

    /**
     * @param int $id
     * @return  Response
     */
    public function show($id)
    {
        $file_category = FileCategory::withTranslation()
            ->with([
                'menu' => function ($query) {
                    $query->withTranslation();
                },
            ])->findOrFail($id);

        return view('back.file_categories.show', compact('file_category'));
    }

    /**
     * @param int $id
     * @return  Response
     */
    public function edit(Request $request, $id)
    {
        $file_category = FileCategory::findOrFail($id);

        return view('back.file_categories.edit', compact('file_category'));
    }

    /**
     * @param \App\Http\Requests\FileCategoryRequest $request
     * @param int $id
     * @return  Response
     */
    public function update(FileCategoryRequest $request, $id)
    {
        $file_category = FileCategory::findOrFail($id);

        $file_category->update($request->all());

        return redirect()->route('back.file_categories.show', $file_category->id)
            ->with('success', trans('og.alert.success'));
    }

    /**
     * @param int $id
     * @return  Response
     */
    public function destroy($id, Request $request)
    {
        $file_category = FileCategory::find($id);

        $menu_id = $file_category->menu_id;

        $file_category->delete();

        return redirect()->route('back.file_categories.index', ['menu_id' => $menu_id])
            ->with('success', trans('og.alert.success'));
    }
}
