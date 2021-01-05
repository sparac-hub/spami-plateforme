<?php

namespace App\Models\Cms;

use App\Models\BaseModel;
use App\Models\Traits\UpdaterTrait;
use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;

class FaqCategory extends BaseModel
{
    use SoftDeletes, Translatable, UpdaterTrait, CascadeSoftDeletes;

    public $translatedAttributes = [
        'slug',
        'name',
        'description',
    ];
    protected $cascadeDeletes = ['translations'];
    protected $buttonsRouteNamePrefix = 'back.faq_categories';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'order',
        'is_active',
        'menu_id',
    ];

    public function setOrderAttribute($value)
    {
        $this->attributes['order'] = $value ?? 0;
    }


    // belongsTo Relationships

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }

    // hasMany Relationships

    public function faq_items()
    {
        return $this->hasMany(FaqItem::class, 'faq_category_id');
    }
}
