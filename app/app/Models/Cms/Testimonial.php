<?php

namespace App\Models\Cms;

use App\Models\BaseModel;
use App\Models\Traits\UpdaterTrait;
use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;

class Testimonial extends BaseModel
{
    use SoftDeletes, Translatable, UpdaterTrait, CascadeSoftDeletes;

    public $translatedAttributes = [
        'title',
        'slug',
        'description',
    ];
    protected $cascadeDeletes = ['translations'];
    protected $buttonsRouteNamePrefix = 'back.testimonials';
    protected $fillable = [
        'menu_id',
        'is_active',
        'order',
        'testimonial_category_id',
        'image',
        'linkedin',
        'facebook',
        'instagram',
        'twitter',
    ];

    protected $dates = ['deleted_at'];

    public function scopeFrontFilter($query, $request, $menu_id)
    {
        $query->whereIsActive(true)
            ->whereMenuId($menu_id)
            ->whereHas('category', function ($query) use ($menu_id) {
                $query->whereMenuId($menu_id)
                    ->whereIsActive(true);
            });

        if ($request->category) {
            $query->where('testimonial_category_id', $request->category);
        }

        if ($request->keywords) {
            $keywords = $request->keywords;

            $query->whereHas('translations', function ($query) use ($keywords) {
                $query->whereLocale(locale())->where(function ($query) use ($keywords) {
                    $query->where('title', config('cms.sql.like'), '%' . $keywords . '%');
                });
            });
        }

        return $query->orderBy('order')->paginate(config('cms.front_pagination.testimonials'));
    }

    // belongsTo Relationships

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }

    public function category()
    {
        return $this->belongsTo(TestimonialCategory::class, 'testimonial_category_id');
    }
}
