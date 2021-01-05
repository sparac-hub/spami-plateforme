<?php

namespace App\Models\Cms;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class LinkType extends BaseModel
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'reference',
        'name',
    ];

    // hasMany Relationships

    public function menus()
    {
        return $this->hasMany(Menu::class, 'menu_id');
    }
}
