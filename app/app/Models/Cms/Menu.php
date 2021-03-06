<?php

namespace App\Models\Cms;

use App\Models\BaseModel;
use App\Models\Traits\UpdaterTrait;
use Dimsav\Translatable\Translatable;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;

class Menu extends BaseModel
{
    use LogsActivity, SoftDeletes, Translatable, UpdaterTrait, CascadeSoftDeletes;

    protected static $logFillable = true;
    public $translatedAttributes = [
        'label',
        'slug',
        'meta_title',
        'meta_description',
        'content',
    ];
    protected $cascadeDeletes = ['translations'];
    protected $backRouteName = 'menus';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'menu_group_id',
        'module_id',
        'menu_id',
        'route_name',
        'route_parameters',
        'parent_id',
        'link_type_id',
        'http_protocol',
        'external_link',
        'internal_link',
        'link_target',
        'is_active',
        'icon',
        'order',
        'css_class',
    ];


    // belongsTo Relationships

    public function module()
    {
        return $this->belongsTo(Module::class, 'module_id');
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'parent_id');
    }

    public function menu_group()
    {
        return $this->belongsTo(MenuGroup::class, 'menu_group_id');
    }

    public function link_type()
    {
        return $this->belongsTo(LinkType::class, 'link_type_id');
    }

    // hasOne
    public function page()
    {
        return $this->hasOne(Page::class);
    }

    public function event()
    {
        return $this->hasOne(Event::class);
    }

    // hasMany Relationships

    public function menus()
    {
        return $this->hasMany(Menu::class, 'parent_id');
    }

    // Accessors and Mutators

    public function getIsActiveHtmlAttribute()
    {
        return ($this->is_active) ?
            '<span class="label label-success">' . __('Active') . '</span>' :
            '<span class="label label-danger">' . __('Inactive') . '</span>';
    }

    public function getBackendLinkAttribute()
    {
        return '<a href="' . route('back.menus.edit', $this->id) . '">' . $this->label . '</a>';
    }

    public function getFrontendLinkAttribute()
    {
        return '<a href="' . route('back.menus.show', $this->id) . '">' . $this->label . '</a>';
    }
}
