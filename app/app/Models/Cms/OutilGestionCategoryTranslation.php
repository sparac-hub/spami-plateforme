<?php

namespace App\Models\Cms;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class OutilGestionCategoryTranslation extends BaseModel
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'outil_gestion_category_id',
        'locale',
        'slug',
        'name',
        'description',
    ];

    // belongsTo Relationships

    public function outil_gestion_category()
    {
        return $this->belongsTo(OutilGestionCategory::class, 'outil_gestion_category_id');
    }
}
