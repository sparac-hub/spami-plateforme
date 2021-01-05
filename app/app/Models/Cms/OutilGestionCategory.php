<?php

namespace App\Models\Cms;

use App\Models\BaseModel;
use App\Models\Traits\UpdaterTrait;
use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;

class OutilGestionCategory extends BaseModel
{
    use SoftDeletes, Translatable, UpdaterTrait, CascadeSoftDeletes;

    public $translatedAttributes = [
        'slug',
        'name',
    ];
    protected $cascadeDeletes = ['translations'];
    protected $buttonsRouteNamePrefix = 'back.outil_gestion_categories';
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

    public function outil_gestion_category_translations()
    {
        return $this->hasMany(OutilGestionCategoryTranslation::class, 'outil_gestion_category_id');
    }

    public function outil_gestions()
    {
        return $this->hasMany(OutilGestion::class, 'outil_gestion_category_id');
    }
}
