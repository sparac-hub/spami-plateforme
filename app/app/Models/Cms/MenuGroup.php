<?php

namespace App\Models\Cms;

use App\Models\BaseModel;

class MenuGroup extends BaseModel
{
    protected $fillable = [
        'name',
        'reference',
    ];

    public function menus()
    {
        return $this->hasMany(Menu::class, 'menu_group_id');
    }
}
