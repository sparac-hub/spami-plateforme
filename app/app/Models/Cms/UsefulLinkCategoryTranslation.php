<?php

namespace App\Models\Cms;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class UsefulLinkCategoryTranslation extends BaseModel
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'useful_link_category_id',
        'locale',
        'slug',
        'title',
        'description',
    ];

    // belongsTo Relationships

    public function useful_link_category()
    {
        return $this->belongsTo(UsefulLinkCategory::class, 'useful_link_category_id');
    }
}
