<?php

namespace App\Models\Cms;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class CityTranslation extends BaseModel
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'locale',
        'city_id',
        'name',
    ];

    // belongsTo Relationships

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }
}
