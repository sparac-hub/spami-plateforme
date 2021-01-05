<?php

namespace App\Models\Cms;

use App\Models\BaseModel;
use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;

class Zone extends BaseModel
{
    use SoftDeletes, Translatable, CascadeSoftDeletes;

    public $translatedAttributes = [
        'name',
    ];
    protected $buttonsRouteNamePrefix = 'back.zones';
    protected $cascadeDeletes = ['translations'];
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'postal_code',
        'city_id',
        'governorate_id',
        'country_id',
        'is_active',
        'order',
    ];

    // belongsTo Relationships

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function governorate()
    {
        return $this->belongsTo(Governorate::class, 'governorate_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    // hasMany Relationships
    public function zone_translations()
    {
        return $this->hasMany(ZoneTranslation::class, 'zone_id');
    }
}
