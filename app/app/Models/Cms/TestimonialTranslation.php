<?php

namespace App\Models\Cms;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class TestimonialTranslation extends BaseModel
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'testimonial_id',
        'locale',
        'title',
        'slug',
        'description',
    ];

    // belongsTo Relationships

    public function testimonial()
    {
        return $this->belongsTo(Testimonial::class, 'testimonial_id');
    }
}
