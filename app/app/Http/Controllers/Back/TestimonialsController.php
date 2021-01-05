<?php

namespace App\Http\Controllers\Back;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\Cms\Testimonial;
use App\Http\Controllers\Controller;
use App\Models\Cms\TestimonialCategory;
use App\Http\Requests\TestimonialRequest;

class TestimonialsController extends Controller
{
    protected $mainModel = 'App\Models\Cms\Testimonial';

    /**
     * @param \Illuminate\Http\Request $request
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

        return view('back.testimonials.index', compact('menu_id'));
    }

    public function datatables(Request $request)
    {
        $where = $request->menu_id ? ['menu_id' => $request->menu_id] : [];

        $testimonial = Testimonial::with([
            'category.translations' => function ($query) {
                $query->whereLocale(locale());
            },
        ])->withTranslation()
            ->where($where)->select((new Testimonial())->getTable() . '.*');

        return datatables()->of($testimonial)
            ->editColumn('id',
                '<a href="{{route(\'back.testimonials.show\', ["id" => $id])}}">{{$id}}</a>')
            ->editColumn('is_active', function ($faq_item) {
                return $faq_item->is_active ? '<span class="label label-success">Active</span>' : '<span class="label label-danger">Inactive</span>';
            })
            ->addColumn('title', function ($model) {
                return $model->translations->first()->title ?? null;
            })
            ->addColumn('description', function ($model) {
                return $model->translations->first()->description ?? null;
            })
            ->addColumn('category', function ($model) {
                return $model->category->title ?? null;
            })
            ->addColumn('actions', function ($model) {
                return $model->enable_button . ' ' . $model->show_button . ' ' . $model->edit_button . ' ' . $model->delete_button;
            })
            ->rawColumns(['id', 'category', 'is_active', 'actions'])
            ->make(true);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return  \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $menu_id = $this->getMenuIdOrFail($request);

        $testimonial_categories = TestimonialCategory::getSelectOptionsForMenu($menu_id);

        return view('back.testimonials.create', compact('testimonial_categories', 'menu_id'));
    }

    /**
     * @param \App\Http\Requests\TestimonialRequest $request
     * @return  \Illuminate\Http\Response
     */
    public function store(TestimonialRequest $request)
    {
        $testimonial = Testimonial::create($request->all());

        forget_cache('testimonials');

        return redirect()->route('back.testimonials.show', $testimonial->id)
            ->with('success', trans('og.alert.success'));
    }

    /**
     * @return  \Illuminate\Http\Response
     */
    public function show(Testimonial $testimonial)
    {
        return view('back.testimonials.show', compact('testimonial'));
    }

    /**
     * @return  \Illuminate\Http\Response
     */
    public function edit(Testimonial $testimonial)
    {
        $testimonial_categories = TestimonialCategory::getSelectOptionsForMenu($testimonial->menu_id);

        return view('back.testimonials.edit', compact('testimonial', 'testimonial_categories'));
    }

    /**
     * @param \App\Http\Requests\TestimonialRequest $request
     * @param int $id
     * @return  \Illuminate\Http\Response
     */
    public function update(TestimonialRequest $request, $id)
    {
        $testimonial = Testimonial::find($id);

        $data = $request->all();
        if ($data['image'] == null) {
            $data['image'] = $testimonial->image;
        }

        $testimonial->update($data);

        forget_cache('testimonials');

        return redirect()->route('back.testimonials.show', $testimonial->id)
            ->with('success', trans('og.alert.success'));
    }

    /**
     * @param int $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);

        $menu_id = $testimonial->menu_id;

        $testimonial->delete();

        return redirect()->route('back.testimonials.index', ['menu_id' => $menu_id])
            ->with('success', trans('og.alert.success'));
    }
}
