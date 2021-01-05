<?php

namespace App\Models\Cms;

use App\Models\BaseModel;
use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class MenuBanner extends BaseModel
{
    use SoftDeletes/*, Translatable*/
        ;

    public $translatedAttributes = ['name'];
    protected $buttonsRouteNamePrefix = 'back.menu_banners';
    protected $dates = ['deleted_at'];

    protected $fillable = [

    ];
}
