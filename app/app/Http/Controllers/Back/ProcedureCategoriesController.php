<?php

namespace App\Http\Controllers\Back;

use App\Http\Requests;
use App\Http\Requests\ProcedureCategoryRequest;
use Illuminate\Http\Request;
use App\Models\Cms\ProcedureCategory;
use App\Http\Controllers\Controller;

class ProcedureCategoriesController extends Controller
{
    protected $mainModel = 'App\Models\Cms\ProcedureCategory';

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

        return view('back.procedure_categories.index', compact('menu_id'));
    }

    public function datatables(Request $request)
    {
        $where = $request->menu_id ? ['menu_id' => $request->menu_id] : [];

        $procedure_categories = ProcedureCategory::withTranslation()
            ->where($where)
            ->select((new ProcedureCategory())->getTable() . '.*');

        return datatables()->of($procedure_categories)
            ->editColumn('id',
                '<a href="{{route(\'back.procedure_categories.show\', ["id" => $id])}}">{{$id}}</a>')
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

        return view('back.procedure_categories.create', compact('menu_id'));
    }

    /**
     * @param \App\Http\Requests\ProcedureCategoryRequest $request
     * @return mixed
     */
    public function store(ProcedureCategoryRequest $request)
    {
        $procedure_category = ProcedureCategory::create($request->all());

        return redirect()->route('back.procedure_categories.show', $procedure_category->id)
            ->with('success', trans('og.alert.success'));
    }

    /**
     * @param int $id
     * @return  Response
     */
    public function show($id)
    {
        $procedure_category = ProcedureCategory::withTranslation()
            ->with([
                'menu' => function ($query) {
                    $query->withTranslation();
                },
            ])->findOrFail($id);

        return view('back.procedure_categories.show', compact('procedure_category'));
    }

    /**
     * @param int $id
     * @return  Response
     */
    public function edit(Request $request, $id)
    {
        $procedure_category = ProcedureCategory::findOrFail($id);

        return view('back.procedure_categories.edit', compact('procedure_category'));
    }

    /**
     * @param \App\Http\Requests\ProcedureCategoryRequest $request
     * @param int $id
     * @return  Response
     */
    public function update(ProcedureCategoryRequest $request, $id)
    {
        $procedure_category = ProcedureCategory::findOrFail($id);

        $procedure_category->update($request->all());

        return redirect()->route('back.procedure_categories.show', $procedure_category->id)
            ->with('success', trans('og.alert.success'));
    }

    /**
     * @param int $id
     * @return  Response
     */
    public function destroy($id, Request $request)
    {
        $procedure_category = ProcedureCategory::find($id);

        $menu_id = $procedure_category->menu_id;

        $procedure_category->delete();

        return redirect()->route('back.procedure_categories.index', ['menu_id' => $menu_id])
            ->with('success', trans('og.alert.success'));
    }
}
