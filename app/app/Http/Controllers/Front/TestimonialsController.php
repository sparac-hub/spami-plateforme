<?php

namespace App\Http\Controllers\Front;

use App\Models\Cms\Menu;
use Illuminate\Http\Request;
use App\Models\Cms\Testimonial;
use App\Models\Cms\TestimonialCategory;

class TestimonialsController extends CmsFrontController
{
    /**
     * @param Request $request
     * @return Response
     */
    public function index(Request $request, Menu $menu)
    {
        $testimonials = Testimonial::frontFilter($request, $menu->id);

        $testimonial_categories = TestimonialCategory::whereIsActive(true)
            ->whereMenuId($menu->id)
            ->withTranslation()
            ->whereHas('testimonials', function ($query) use ($menu) {
                $query->whereMenuId($menu->id)
                    ->whereIsActive(true);
            })
            ->orderBy('order')
            ->get();

        return view(front_dir() . '.testimonials.index', compact('testimonials', 'testimonial_categories', 'menu'));
    }
}
