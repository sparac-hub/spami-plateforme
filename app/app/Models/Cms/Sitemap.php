<?php

namespace App\Models\Cms;

use App\Models\BaseModel;
use App\Models\Traits\UpdaterTrait;
use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;

class Sitemap extends BaseModel
{
    use SoftDeletes, Translatable, UpdaterTrait, CascadeSoftDeletes;

    public $translatedAttributes = [
        'slug',
        'title',
        'description',
    ];
    protected $cascadeDeletes = ['translations'];
    protected $buttonsRouteNamePrefix = 'back.sitemaps';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'menu_id',
        'menu_group_ids',
        'order',
        'is_active',
    ];

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }

    public function setMenuGroupIdsAttribute($data)
    {
        $this->attributes['menu_group_ids'] = implode(",", $data);
    }

    public function getMenuGroups()
    {
        if ($this->menu_group_ids) {
            $ids = explode(",", $this->menu_group_ids);
            return MenuGroup::find($ids);
        }

        return null;
    }
}
