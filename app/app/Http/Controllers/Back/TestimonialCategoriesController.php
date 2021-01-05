<?php

namespace App\Http\Controllers\Back;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\Cms\TestimonialCategory;
use App\Http\Controllers\Controller;

class TestimonialCategoriesController extends Controller
{
    protected $mainModel = 'App\Models\Cms\TestimonialCategory';

    /**
     * @return  \Illuminate\Http\Response
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

        return view('back.testimonial_categories.index', compact('menu_id'));
    }

    /**/

    public function datatables(Request $request)
    {
        $where = $request->menu_id ? ['menu_id' => $request->menu_id] : [];

        $testimonial_categories = TestimonialCategory::withTranslation()
            ->where($where)
            ->select((new TestimonialCategory())->getTable() . '.*');

        return datatables()->of($testimonial_categories)
            ->editColumn('id',
                '<a href="{{route(\'back.testimonial_categories.show\', ["id" => $id])}}">{{$id}}</a>')
            ->editColumn('is_active', function ($faq_item) {
                return $faq_item->is_active ? '<span class="label label-success">Active</span>' : '<span class="label label-danger">Inactive</span>';
            })
            ->addColumn('title', function ($model) {
                return $model->translations->first()->title ?? null;
            })
            ->addColumn('description', function ($model) {
                return $model->translations->first()->description ?? null;
            })
            ->addColumn('slug', function ($model) {
                return $model->translations->first()->slug ?? null;
            })
            ->addColumn('actions', function ($model) {
                return $model->enable_button . ' ' . $model->show_button . ' ' . $model->edit_button . ' ' . $model->delete_button;
            })
            ->rawColumns(['id', 'is_active', 'actions'])
            ->make(true);
    }

    public function create(Request $request)
    {
        $menu_id = $this->getMenuIdOrFail($request);

        return view('back.testimonial_categories.create', compact('menu_id'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Requests\TestimonialCategoryRequest $request)
    {
        $testimonial_category = TestimonialCategory::create($request->all());

        return redirect()->route('back.testimonial_categories.show',
            $testimonial_category->id)->with('success', trans('og.alert.success'));
    }

    /**
     * @return  \Illuminate\Http\Response
     */
    public function show(TestimonialCategory $testimonial_category)
    {
        return view('back.testimonial_categories.show', compact('testimonial_category'));
    }

    /**
     * @param TestimonialCategory $testimonial_category
     * @return \Illuminate\Http\Response
     */
    public function edit(TestimonialCategory $testimonial_category)
    {
        return view('back.testimonial_categories.edit', compact('testimonial_category'));
    }

    /**
     * @param Requests\TestimonialCategoryRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\TestimonialCategoryRequest $request, $id)
    {
        $data = $request->all();
        $testimonial_category = TestimonialCategory::find($id);
        $testimonial_category->update($data);

        return redirect()->route('back.testimonial_categories.show',
            $testimonial_category->id)->with('success', trans('og.alert.success'));
    }

    /**
     * @param int $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimonial_category = TestimonialCategory::findOrFail($id);
        $menu_id = $testimonial_category->menu_id;
        $testimonial_category->delete();

        return redirect()->route('back.testimonial_categories.index', ['menu_id' => $menu_id])->with('success',
            trans('og.alert.success'));
    }
}
