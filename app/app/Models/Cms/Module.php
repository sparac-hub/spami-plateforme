<?php

namespace App\Models\Cms;

use App\Models\BaseModel;
use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;

class Module extends BaseModel
{
    use SoftDeletes, Translatable, CascadeSoftDeletes;

    public $translatedAttributes = [
        'name', // Module name : will be shown on sidebar
    ];
    protected $buttonsRouteNamePrefix = 'back.modules';
    protected $cascadeDeletes = ['translations'];
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'reference',
        'main_model',
        'widget_orderable_columns',
        'is_active',
        'is_menu_module',
        'order',
        'icon',
        'backend_route',
        'frontend_route',
        'front_namespace',
        'front_controller',
        'is_on_backend_sidebar', // show/hide module on dashboard sidebar
        'parent_id',
    ];

    public function getFrontControllerWithNamespaceAttribute()
    {
        return ($this->front_controller) ? $this->front_namespace . '\\' . $this->front_controller : null;
    }

    public function getFrontalControllerAttribute()
    {
        $namespace = '\App\Http\Controllers\\';

        $controller = ($this->front_controller) ? $this->front_namespace . '\\' . $this->front_controller : null;

        return $namespace . $controller;
    }

    // hasMany Relationships

    public function menus()
    {
        return $this->hasMany(Menu::class, 'modules_id');
    }

    public function modules()
    {
        return $this->hasMany(Module::class, 'parent_id');
    }

    // ManyToMany

    public function getOrderableColumnsArrayAttribute()
    {
        return json_decode($this->widget_orderable_columns);
    }
}
