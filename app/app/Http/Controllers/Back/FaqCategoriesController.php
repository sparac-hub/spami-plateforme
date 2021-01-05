<?php

namespace App\Http\Controllers\Back;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\Cms\FaqCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\FaqCategoryRequest;

class FaqCategoriesController extends Controller
{
    protected $mainModel = 'App\Models\Cms\FaqCategory';

    /**
     * @param Request $request
     * @return Response
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

        return view('back.faq_categories.index', compact('menu_id'));
    }

    public function datatables(Request $request)
    {
        $where = $request->menu_id ? ['menu_id' => $request->menu_id] : [];

        $faq_categories = FaqCategory::withTranslation()
            ->where($where)
            ->select((new FaqCategory())->getTable() . '.*');

        return datatables()->of($faq_categories)
            ->editColumn('id',
                '<a href="{{route(\'back.faq_categories.show\', ["id" => $id])}}">{{$id}}</a>')
            ->addColumn('actions', function ($model) {
                return $model->enable_button . ' ' . $model->show_button . ' ' . $model->edit_button . ' ' . $model->delete_button;
            })
            ->rawColumns(['id', 'actions'])
            ->make(true);
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function create(Request $request)
    {
        $menu_id = $this->getMenuIdOrFail($request);

        return view('back.faq_categories.create', compact('menu_id'));
    }

    /**
     * @param \App\Http\Requests\FaqCategoryRequest $request
     * @return  Response
     */
    public function store(FaqCategoryRequest $request)
    {
        $faq_category = FaqCategory::create($request->all());

        return redirect()->route('back.faq_categories.show',
            $faq_category->id)->with('success', trans('og.alert.success'));
    }

    /**
     * @param int $id
     * @return  Response
     */
    public function show($id)
    {
        $faq_category = FaqCategory::withTranslation()
            ->with([
                'menu' => function ($query) {
                    $query->withTranslation();
                },
            ])->findOrFail($id);

        return view('back.faq_categories.show', compact('faq_category'));
    }

    /**
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function edit(Request $request, $id)
    {
        $faq_category = FaqCategory::findOrFail($id);
        return view('back.faq_categories.edit', compact('faq_category'));
    }

    /**
     * @param \App\Http\Requests\FaqCategoryRequest $request
     * @param int $id
     * @return  Response
     */
    public function update(FaqCategoryRequest $request, $id)
    {
        $faq_category = FaqCategory::find($id);
        $faq_category->update($request->all());

        return redirect()->route('back.faq_categories.show', $faq_category->id)
            ->with('success', trans('og.alert.success'));

    }

    /**
     * @param int $id
     * @param Request $request
     * @return Response
     */
    public function destroy($id)
    {
        $faq_category = FaqCategory::findOrFail($id);

        $menu_id = $faq_category->menu_id;

        $faq_category->delete();

        return redirect()->route('back.faq_categories.index', ['menu_id' => $menu_id])->with('success',
            trans('og.alert.success'));
    }
}
