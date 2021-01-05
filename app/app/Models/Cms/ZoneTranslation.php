<?php

namespace App\Models\Cms;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class ZoneTranslation extends BaseModel
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'locale',
        'zone_id',
        'name',
    ];

    // belongsTo Relationships

    public function zone()
    {
        return $this->belongsTo(Zone::class, 'zone_id');
    }
}
