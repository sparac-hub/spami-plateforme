<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Model;

class AspimCountry extends Model
{
    public $timestamps = false;
    protected $table = 'aspims_countries';
    protected $fillable = [
        'aspim_id',
        'country_id',
    ];

    // belongsTo Relationships
    public function country()
    {
        return $this->hasMany(Country::class, 'aspim_category_id');
    }
}
