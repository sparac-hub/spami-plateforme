<?php

namespace App\Models\Cms;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class CountryTranslation extends BaseModel
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'nationality',
        'locale',
        'country_id',
    ];

    // belongsTo Relationships

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
}
