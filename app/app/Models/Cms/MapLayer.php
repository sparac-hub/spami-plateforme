<?php

namespace App\Models\Cms;

use App\Models\BaseModel;
use App\Models\Traits\UpdaterTrait;
use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;

class MapLayer extends BaseModel
{
    use SoftDeletes, Translatable, UpdaterTrait, CascadeSoftDeletes;

    public $translatedAttributes = [
        'name',
        'description',
    ];
    protected $cascadeDeletes = ['translations'];
    protected $buttonsRouteNamePrefix = 'back.map_layers';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'menu_id',
        'is_active',
        'layer',
        'order',
    ];

    public function getFullUrlAttribute()
    {
        return "{$this->protocol}{$this->url}";
    }

    public function scopeFrontFilter($query, $request, $menu_id = null)
    {
        $query->whereIsActive(true);
        if ($menu_id) {
            $query->whereMenuId($menu_id);
        }

        if ($request->keywords) {
            $keywords = $request->keywords;

            $query->whereHas('translations', function ($query) use ($keywords) {
                $query->whereLocale(locale())->where(function ($query) use ($keywords) {
                    $query->where('title', config('cms.sql.like'), '%' . $keywords . '%');
                });
            });
        }

        return $query->orderBy('order')->paginate(config('cms.front_pagination.map_layers'));
    }

    // belongsTo Relationships

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }
}
