<?php

namespace App\Models\Cms;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;


class GovernorateTranslation extends BaseModel
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'locale',
        'governorate_id',
        'name',
    ];

    // belongsTo Relationships

    public function governorate()
    {
        return $this->belongsTo(Governorate::class, 'governorate_id');
    }
}
