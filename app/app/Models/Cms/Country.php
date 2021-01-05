<?php

namespace App\Models\Cms;

use App\Models\BaseModel;
use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;

class Country extends BaseModel
{
    use SoftDeletes, Translatable, CascadeSoftDeletes;

    public $translatedAttributes = [
        'name',
        'nationality',
    ];
    protected $buttonsRouteNamePrefix = 'back.countries';
    protected $cascadeDeletes = ['translations'];
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'order',
        'is_active',
    ];

    // hasMany Relationships

    public function country_translations()
    {
        return $this->hasMany(CountryTranslation::class, 'country_id');
    }

    public function governorates()
    {
        return $this->hasMany(Governorate::class, 'country_id');
    }

    public function cities()
    {
        return $this->hasMany(City::class, 'country_id');
    }

    public function zones()
    {
        return $this->hasMany(Zone::class, 'country_id');
    }
}
