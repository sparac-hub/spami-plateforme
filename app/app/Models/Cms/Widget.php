<?php

namespace App\Models\Cms;

use App\Models\BaseModel;
use App\Models\Traits\UpdaterTrait;
use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;

class Widget extends BaseModel
{
    use SoftDeletes, Translatable, UpdaterTrait, CascadeSoftDeletes;

    const HOME_PAGE = 1;
    public $translatedAttributes = [
        'name',
        'description',
        'button_title',
    ];
    protected $cascadeDeletes = ['translations'];
    protected $fillable = [
        'reference',
        'placement',
        'home_id',
        'module_id',
        'order_column',
        'order_column_type',
        'type', // free means you add it to any page | all means it will appear in all pages
        'select_type', // free_select means you can choose the elements | latest will get you the last created_at elements
        'number_for_latest', // related to select_type=="latest" it represents the number of elements
        'is_active',
        'order',
    ];

    protected $dates = ['deleted_at'];

    // belongsTo Relationships

    public function module()
    {
        return $this->belongsTo(Module::class, 'module_id');
    }

    public function widget_elements()
    {
        return $this->hasMany(WidgetElement::class, 'widget_id');
    }

    // hasMany Relationships

    public function widget_menus()
    {
        return $this->hasMany(WidgetMenu::class, 'widget_id');
    }

    // ManyToMany

    public function scopeGetByMenuAndPlacement($query, $placement, $menu_id)
    {
        return $query->wherePlacement($placement)->where(function ($query) use ($menu_id) {
            $query->whereType('all')->orWhereHas('widget_menus', function ($query) use ($menu_id) {
                $query->whereMenuId($menu_id);
            });
        })->whereIsActive(true)->orderBy('order')->get();
    }


}
