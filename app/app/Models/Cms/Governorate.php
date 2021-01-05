<?php

namespace App\Models\Cms;

use App\Models\BaseModel;
use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;

class Governorate extends BaseModel
{
    use SoftDeletes, Translatable, CascadeSoftDeletes;

    public $translatedAttributes = [
        'name',
    ];
    protected $buttonsRouteNamePrefix = 'back.governorates';
    protected $cascadeDeletes = ['translations'];
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'country_id',
        'is_active',
        'order',
    ];

    // belongsTo Relationships

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    // hasMany Relationships
    public function governorate_translations()
    {
        return $this->hasMany(GovernorateTranslation::class, 'governorate_id');
    }

    public function cities()
    {
        return $this->hasMany(City::class, 'governorate_id');
    }

    public function zones()
    {
        return $this->hasMany(Zone::class, 'governorate_id');
    }
}
