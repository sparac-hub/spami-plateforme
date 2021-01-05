<?php

namespace App\Http\Controllers\Back;

use App\Http\Requests;
use App\Http\Requests\PlanCategoryRequest;
use Illuminate\Http\Request;
use App\Models\Cms\PlanCategory;
use App\Http\Controllers\Controller;

class PlanCategoriesController extends Controller
{
    protected $mainModel = 'App\Models\Cms\PlanCategory';

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

        return view('back.plan_categories.index', compact('menu_id'));
    }

    public function datatables(Request $request)
    {
        $where = $request->menu_id ? ['menu_id' => $request->menu_id] : [];

        $plan_categories = PlanCategory::withTranslation()
            ->where($where)
            ->select((new PlanCategory())->getTable() . '.*');

        return datatables()->of($plan_categories)
            ->editColumn('id',
                '<a href="{{route(\'back.plan_categories.show\', ["id" => $id])}}">{{$id}}</a>')
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

        return view('back.plan_categories.create', compact('menu_id'));
    }

    /**
     * @param \App\Http\Requests\PlanCategoryRequest $request
     * @return mixed
     */
    public function store(PlanCategoryRequest $request)
    {
        // dd($request->toArray());
        $plan_category = PlanCategory::create($request->all());

        return redirect()->route('back.plan_categories.show', $plan_category->id)
            ->with('success', trans('og.alert.success'));
    }

    /**
     * @param int $id
     * @return  Response
     */
    public function show($id)
    {
        $plan_category = PlanCategory::withTranslation()
            ->with([
                'menu' => function ($query) {
                    $query->withTranslation();
                },
            ])->findOrFail($id);

        return view('back.plan_categories.show', compact('plan_category'));
    }

    /**
     * @param int $id
     * @return  Response
     */
    public function edit(Request $request, $id)
    {
        $plan_category = PlanCategory::findOrFail($id);

        return view('back.plan_categories.edit', compact('plan_category'));
    }

    /**
     * @param \App\Http\Requests\PlanCategoryRequest $request
     * @param int $id
     * @return  Response
     */
    public function update(PlanCategoryRequest $request, $id)
    {
        $plan_category = PlanCategory::findOrFail($id);

        $plan_category->update($request->all());

        return redirect()->route('back.plan_categories.show', $plan_category->id)
            ->with('success', trans('og.alert.success'));
    }

    /**
     * @param int $id
     * @return  Response
     */
    public function destroy($id, Request $request)
    {
        $plan_category = PlanCategory::find($id);

        $menu_id = $plan_category->menu_id;

        $plan_category->delete();

        return redirect()->route('back.plan_categories.index', ['menu_id' => $menu_id])
            ->with('success', trans('og.alert.success'));
    }
}
