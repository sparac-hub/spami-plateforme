<?php

namespace App\Http\Controllers\Back;

use App\Http\Requests;
use App\Http\Requests\TrainingCategoryRequest;
use Illuminate\Http\Request;
use App\Models\Cms\TrainingCategory;
use App\Http\Controllers\Controller;

class TrainingCategoriesController extends Controller
{
    protected $mainModel = 'App\Models\Cms\TrainingCategory';

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

        return view('back.training_categories.index', compact('menu_id'));
    }

    public function datatables(Request $request)
    {
        $where = $request->menu_id ? [(new TrainingCategory())->getTable() . '.menu_id' => $request->menu_id] : [];

        $training_categories = TrainingCategory::withTranslation()
            ->where($where)
            ->select((new TrainingCategory())->getTable() . '.*');

        return datatables()->of($training_categories)
            ->editColumn('id',
                '<a href="{{route(\'back.training_categories.show\', ["id" => $id])}}">{{$id}}</a>')
            ->addColumn('slug', function ($model) {
                return $model->translations->first()->slug ?? null;
            })
            ->addColumn('name', function ($model) {
                return $model->translations->first()->name ?? null;
            })
            ->addColumn('description', function ($model) {
                return $model->translations->first()->description ?? null;
            })
            ->editColumn('is_active', function ($model) {
                return $model->is_active ? '<span class="label label-success">Active</span>' : '<span class="label label-danger">Inactive</span>';
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

        return view('back.training_categories.create', compact('menu_id'));
    }

    /**
     * @param \App\Http\Requests\TrainingCategoryRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(TrainingCategoryRequest $request)
    {
        $training_category = TrainingCategory::create($request->all());

        return redirect()->route('back.training_categories.show',
            $training_category->id)->with('success', trans('og.alert.success'));
    }

    /**
     * @param int $id
     * @return  Response
     */
    public function show($id)
    {
        $training_category = TrainingCategory::withTranslation()
            ->with([
                'menu' => function ($query) {
                    $query->withTranslation();
                },
            ])->findOrFail($id);

        return view('back.training_categories.show', compact('training_category'));
    }

    /**
     * @param TrainingCategory $training_category
     * @return \Illuminate\Http\Response
     */
    public function edit(TrainingCategory $training_category)
    {
        return view('back.training_categories.edit', compact('training_category'));
    }

    /**
     * @param \App\Http\Requests\TrainingCategoryRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(TrainingCategoryRequest $request, $id)
    {
        $training_category = TrainingCategory::findOrFail($id);

        $training_category->update($request->all());

        return redirect()->route('back.training_categories.show', $training_category->id)
            ->with('success', trans('og.alert.success'));
    }

    /**
     * @param int $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $training_category = TrainingCategory::findOrFail($id);

        $menu_id = $training_category->menu_id;

        $training_category->delete();

        return redirect()->route('back.training_categories.index', ['menu_id' => $menu_id])
            ->with('success', trans('og.alert.success'));
    }
}
