<?php

namespace App\Models\Cms;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class UsefulLinkTranslation extends BaseModel
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'useful_link_id',
        'locale',
        'title',
        'description',
    ];

    // belongsTo Relationships

    public function useful_link()
    {
        return $this->belongsTo(UsefulLink::class, 'useful_link_id');
    }
}
