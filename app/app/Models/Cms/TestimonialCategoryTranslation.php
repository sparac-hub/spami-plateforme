<?php

namespace App\Models\Cms;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class TestimonialCategoryTranslation extends BaseModel
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'testimonial_category_id',
        'locale',
        'slug',
        'title',
        'description',
    ];

    public function testimonial_category()
    {
        return $this->belongsTo(TestimonialCategory::class, 'testimonial_category_id');
    }
}
