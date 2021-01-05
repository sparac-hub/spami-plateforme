<?php

namespace App\Models\Cms;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class PartnerTranslation extends BaseModel
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'partner_id',
        'locale',
        'title',
        'description',
    ];

    // belongsTo Relationships

    public function partner()
    {
        return $this->belongsTo(Partner::class, 'partner_id');
    }
}
