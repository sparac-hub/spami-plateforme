<?php

namespace App\Models\Cms;

use App\Models\BaseModel;
use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;

class City extends BaseModel
{
    use SoftDeletes, Translatable, CascadeSoftDeletes;

    public $translatedAttributes = [
        'name',
    ];
    protected $buttonsRouteNamePrefix = 'back.cities';
    protected $cascadeDeletes = ['translations'];
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'country_id',
        'governorate_id',
        'is_active',
        'order',
    ];

    // belongsTo Relationships

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function governorate()
    {
        return $this->belongsTo(Governorate::class, 'governorate_id');
    }

    // hasMany Relationships
    public function city_translations()
    {
        return $this->hasMany(CityTranslation::class, 'city_id');
    }

    public function zones()
    {
        return $this->hasMany(Zone::class, 'city_id');
    }
}
