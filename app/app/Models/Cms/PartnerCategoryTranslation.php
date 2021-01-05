<?php

namespace App\Models\Cms;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class PartnerCategoryTranslation extends BaseModel
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'partner_category_id',
        'locale',
        'slug',
        'title',
        'description',
    ];

    // belongsTo Relationships

    public function partner_category()
    {
        return $this->belongsTo(PartnerCategory::class, 'partner_category_id');
    }
}
