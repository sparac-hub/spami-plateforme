<?php

namespace App\Http\Controllers\Back;

use App\Http\Requests;
use App\Http\Requests\PlanRequest;
use App\Models\Cms\Plan;
use Illuminate\Http\Request;
use App\Models\Cms\PlanCategory;
use App\Http\Controllers\Controller;
use App\Models\Cms\Aspim;

class PlansController extends Controller
{
    protected $mainModel = 'App\Models\Cms\Plan';

    /**
     * @return  Response
     */
    public function index(Request $request)
    {
        $aspims = Aspim::all();
        if ($request->ajax() && $request->toggleStatus) {
            return $this->toggleStatus($request);
        }

        $menu_id = $this->getMenuIdOrFail($request);

        if ($request->ajax() or $request->debug) {
            return $this->datatables($request);
        }

        return view('back.plans.index', compact('menu_id', 'aspims'));
    }

    public function datatables(Request $request)
    {

        $where = $request->menu_id ? [(new Plan())->getTable() . '.menu_id' => $request->menu_id] : [];

        $plan = Plan::withTranslation()
            ->with('category.translations')
            ->with('aspim.translations')
            ->where($where)
            ->select((new Plan)->getTable() . '.*');


        return datatables()->of($plan)
            ->editColumn('id',
                '<a href="{{route(\'back.plans.show\', ["id" => $id])}}">{{$id}}</a>')
            ->addColumn('category', function ($model) {
                return $model->plan_category_id ?
                    '<a href="' . route('back.plan_categories.show',
                        $model->plan_category_id) . '">' . $model->category->name . '</a>' :
                    null;
            })
            ->addColumn('aspim', function ($model) {
                return $model->aspim_id ?
                    '<a href="' . route('back.aspims.show',
                        $model->aspim_id) . '">' . $model->aspim->name . '</a>' :
                    null;
            })
            ->addColumn('actions', function ($model) {
                return $model->enable_button . ' ' . $model->show_button . ' ' . $model->edit_button . ' ' . $model->delete_button;
            })
            ->rawColumns(['id', 'actions', 'aspim', 'category'])
            ->make(true);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return  \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $menu_id = $this->getMenuIdOrFail($request);
        $aspims = Aspim::all();
        $plan_categories = PlanCategory::whereMenuId($request->menu_id)->get();

        return view('back.plans.create', compact('plan_categories', 'menu_id', 'aspims'));
    }

    /**
     * @param \App\Http\Requests\PlanRequest $request
     * @return  \Illuminate\Http\Response
     */
    public function store(PlanRequest $request)
    {
        $plan = Plan::create($request->all());
        $plan->addMediaFromRequest('plan')
            ->toMediaCollection();

        return redirect()->route('back.plans.show', $plan->id)->with('success',
            trans('og.alert.success'));
    }

    /**
     * @return  \Illuminate\Http\Response
     */
    public function show(Plan $plan)
    {
        $aspims = Aspim::all();
        return view('back.plans.show', compact('plan', 'aspims'));
    }

    /**
     * @return  \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $aspims = Aspim::all();
        $plan = Plan::with('category', 'media')->findOrFail($id);

        $plan_categories = PlanCategory::whereMenuId($plan->menu_id)->get();

        return view('back.plans.edit', compact('plan', 'plan_categories', 'aspims'));
    }

    /**
     * @param \App\Http\Requests\PlanRequest $request
     * @param int $id
     * @return  \Illuminate\Http\Response
     */
    public function update(PlanRequest $request, $id)
    {
        $data = $request->all();
        $plan = Plan::with('media')->find($id);
        $plan->update($data);

        if ($request->hasFile('plan')) {
            if ($media = $plan->media->first()) {
                $media->delete();
            }
            $plan->addMediaFromRequest('plan')->toMediaCollection();
        }

        return redirect()->route('back.plans.show', $plan->id)->with('success',
            trans('og.alert.success'));
    }

    /**
     * @param int $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $plan = Plan::findOrFail($id);

        $menu_id = $plan->menu_id;

        $plan->delete();

        return redirect()->route('back.plans.index', ['menu_id' => $menu_id])->with('success',
            trans('og.alert.success'));
    }
}
