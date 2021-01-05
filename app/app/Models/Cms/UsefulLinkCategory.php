<?php

namespace App\Models\Cms;

use App\Models\BaseModel;
use App\Models\Traits\UpdaterTrait;
use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;

class UsefulLinkCategory extends BaseModel
{
    use SoftDeletes, Translatable, UpdaterTrait, CascadeSoftDeletes;

    public $translatedAttributes = [
        'slug',
        'title',
        'description',
    ];
    protected $cascadeDeletes = ['translations'];
    protected $buttonsRouteNamePrefix = 'back.useful_link_categories';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'menu_id',
        'order',
        'is_active',
    ];

    // belongsTo Relationships

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }

    // hasMany Relationships

    public function useful_link_category_translations()
    {
        return $this->hasMany(UsefulLinkCategoryTranslation::class, 'useful_link_category_id');
    }

    public function useful_links()
    {
        return $this->hasMany(UsefulLink::class, 'useful_link_category_id');
    }

    // Accessors
    public function getLinkAttribute()
    {
        return '<a href="' . route('back.useful_link_categories.show', $this->id) . '">' . $this->title . '</a>';
    }
}
