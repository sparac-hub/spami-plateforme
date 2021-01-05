<?php

namespace App\Models\Cms;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlanCategoryTranslation extends BaseModel
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'plan_category_id',
        'locale',
        'slug',
        'name',
        'description',
    ];

    // belongsTo Relationships
    public function plan_category()
    {
        return $this->belongsTo(PlanCategory::class, 'plan_category_id');
    }
}
