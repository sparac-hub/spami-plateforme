<?php

namespace App\Models\Cms;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class AspimTranslation extends BaseModel
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'aspim_id',
        'locale',
        'name',
        'slug',
        'status',
        'schemas',
        'creation_text',
        'physical_features',
        'ecological_features',
        'threats_and_pressures',
        'teritory',
        'mediterranean_importance',
        'management_body',
        'geographic_position',
        'meta_title',
        'meta_description',
    ];


    // belongsTo Relationships

    public function aspim()
    {
        return $this->belongsTo(Event::class, 'aspim_id');
    }
}
