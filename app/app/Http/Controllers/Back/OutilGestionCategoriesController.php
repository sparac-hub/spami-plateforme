<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Models\Cms\OutilGestionCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\OutilGestionCategoryRequest;

class OutilGestionCategoriesController extends Controller
{
    protected $mainModel = 'App\Models\Cms\OutilGestionCategory';

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

        return view('back.outil_gestion_categories.index', compact('menu_id'));
    }

    public function datatables(Request $request)
    {
        $where = $request->menu_id ? [(new OutilGestionCategory())->getTable() . '.menu_id' => $request->menu_id] : [];

        $outil_gestion_categories = OutilGestionCategory::withTranslation()
            ->where($where)
            ->select((new OutilGestionCategory())->getTable() . '.*');

        return datatables()->of($outil_gestion_categories)
            ->editColumn('id',
                '<a href="{{route(\'back.outil_gestion_categories.show\', ["id" => $id])}}">{{$id}}</a>')
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

        return view('back.outil_gestion_categories.create', compact('menu_id'));
    }

    /**
     * @param \App\Http\Requests\OutilGestionCategoryRequest $request
     * @return  \Illuminate\Http\Response
     */
    public function store(OutilGestionCategoryRequest $request)
    {
        $outil_gestion_category = OutilGestionCategory::create($request->prepared());

        return redirect()->route('back.outil_gestion_categories.show',
            $outil_gestion_category->id)->with('success', trans('og.alert.success'));
    }

    /**
     * @param int $id
     * @return  Response
     */
    public function show($id)
    {
        $outil_gestion_category = OutilGestionCategory::withTranslation()
            ->with([
                'menu' => function ($query) {
                    $query->withTranslation();
                },
            ])->findOrFail($id);

        return view('back.outil_gestion_categories.show', compact('outil_gestion_category'));
    }

    /**
     * @param OutilGestionCategory $outil_gestion_category
     * @return \Illuminate\Http\Response
     */
    public function edit(OutilGestionCategory $outil_gestion_category)
    {
        return view('back.outil_gestion_categories.edit', compact('outil_gestion_category'));
    }

    /**
     * @param \App\Http\Requests\OutilGestionCategoryRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(OutilGestionCategoryRequest $request, $id)
    {
        $outil_gestion_category = OutilGestionCategory::findOrFail($id);

        $outil_gestion_category->update($request->prepared());

        return redirect()->route('back.outil_gestion_categories.show',
            $outil_gestion_category->id)->with('success', trans('og.alert.success'));
    }

    /**
     * @param int $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $outil_gestion_category = OutilGestionCategory::findOrFail($id);
        $menu_id = $outil_gestion_category->menu_id;

        $outil_gestion_category->delete();

        return redirect()->route('back.outil_gestion_categories.index', ['menu_id' => $menu_id])->with('success',
            trans('og.alert.success'));
    }
}
