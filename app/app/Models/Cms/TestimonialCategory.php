<?php

namespace App\Models\Cms;

use App\Models\BaseModel;
use App\Models\Traits\UpdaterTrait;
use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;

class TestimonialCategory extends BaseModel
{
    use SoftDeletes, Translatable, UpdaterTrait, CascadeSoftDeletes;

    public $translatedAttributes = [
        'slug',
        'title',
        'description',
    ];
    protected $cascadeDeletes = ['translations'];
    protected $buttonsRouteNamePrefix = 'back.testimonial_categories';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'menu_id',
        'order',
        'is_active',
    ];

    // belongsTo Relationships

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }

    // hasMany Relationships

    public function testimonial_category_translations()
    {
        return $this->hasMany(TestimonialCategoryTranslation::class, 'testimonial_category_id');
    }

    public function testimonials()
    {
        return $this->hasMany(Testimonial::class, 'testimonial_category_id');
    }
}
