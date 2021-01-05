<?php

namespace App\Http\Controllers\Back;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\Cms\Training;
use App\Http\Controllers\Controller;
use App\Models\Cms\TrainingCategory;
use App\Http\Requests\TrainingRequest;

class TrainingsController extends Controller
{
    protected $mainModel = 'App\Models\Cms\Training';

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

        return view('back.trainings.index', compact('menu_id'));
    }

    public function datatables(Request $request)
    {
        $where = $request->menu_id ? [(new Training())->getTable() . '.menu_id' => $request->menu_id] : [];

        $trainings = Training::withTranslation()
            ->with('category')
            ->where($where)
            ->select((new Training)->getTable() . '.*');

        return datatables()->of($trainings)
            ->editColumn('id',
                '<a href="{{route(\'back.trainings.show\', ["id" => $id])}}">{{$id}}</a>')
            ->addColumn('category', function ($model) {
                return isset($model->category->name) ?
                    '<a href="' . route('back.training_categories.show',
                        $model->training_category_id) . '">' . $model->category->name . '</a>' :
                    null;
            })
            ->addColumn('slug', function ($model) {
                return $model->translations->first()->slug ?? null;
            })
            ->addColumn('name', function ($model) {
                return $model->translations->first()->name ?? null;
            })
            ->addColumn('meta_title', function ($model) {
                return $model->translations->first()->meta_title ?? null;
            })
            ->addColumn('meta_description', function ($model) {
                return $model->translations->first()->meta_description ?? null;
            })
            ->addColumn('actions', function ($model) {
                return $model->enable_button . ' ' . $model->show_button . ' ' . $model->edit_button . ' ' . $model->delete_button;
            })
            ->rawColumns(['id', 'is_active', 'category', 'actions'])
            ->make(true);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $menu_id = $this->getMenuIdOrFail($request);

        $training_categories = TrainingCategory::getSelectOptionsForMenu($menu_id);

        return view('back.trainings.create', compact('training_categories', 'menu_id'));
    }

    /**
     * @param \App\Http\Requests\TrainingRequest $request
     * @return  \Illuminate\Http\Response
     */
    public function store(TrainingRequest $request)
    {
        $training = Training::create($request->all());

        return redirect()->route('back.trainings.show', $training->id)
            ->with('success', trans('og.alert.success'));
    }

    /**
     * @return  \Illuminate\Http\Response
     */
    public function show($id)
    {
        $training = Training::withTranslation()
            ->with([
                'menu' => function ($query) {
                    $query->withTranslation();
                },
            ])->findOrFail($id);

        return view('back.trainings.show', compact('training'));
    }

    /**
     * @param Training $training
     * @return \Illuminate\Http\Response
     */
    public function edit(Training $training)
    {
        $training_categories = TrainingCategory::getSelectOptionsForMenu($training->menu_id);

        return view('back.trainings.edit', compact('training', 'training_categories'));
    }

    /**
     * @param \App\Http\Requests\TrainingRequest $request
     * @param int $id
     * @return  \Illuminate\Http\Response
     */
    public function update(TrainingRequest $request, $id)
    {
        $training = Training::findOrFail($id);

        $training->update($request->all());

        $training->save();

        return redirect()->route('back.trainings.show', $training->id)
            ->with('success', trans('og.alert.success'));
    }

    /**
     * @param int $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $training = Training::findOrFail($id);

        $menu_id = $training->menu_id;

        $training->delete();

        return redirect()->route('back.trainings.index', ['menu_id' => $menu_id])
            ->with('success', trans('og.alert.success'));
    }
}
