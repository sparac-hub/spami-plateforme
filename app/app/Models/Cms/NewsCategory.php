<?php

namespace App\Models\Cms;

use App\Models\BaseModel;
use App\Models\Traits\UpdaterTrait;
use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;

class NewsCategory extends BaseModel
{
    use SoftDeletes, Translatable, UpdaterTrait, CascadeSoftDeletes;

    public $translatedAttributes = [
        'slug',
        'name',
        'description',
    ];
    protected $cascadeDeletes = ['translations'];
    protected $buttonsRouteNamePrefix = 'back.news_categories';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'menu_id',
        'is_active',
        'order',
    ];

    // belongsTo Relationships

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }

    // hasMany Relationships

    public function news_category_translations()
    {
        return $this->hasMany(NewsCategoryTranslation::class, 'news_category_id');
    }

    public function news()
    {
        return $this->hasMany(News::class, 'news_category_id');
    }
}
