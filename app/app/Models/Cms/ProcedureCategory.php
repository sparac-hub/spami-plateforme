<?php

namespace App\Models\Cms;

use App\Models\BaseModel;
use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;

class ProcedureCategory extends BaseModel
{
    use SoftDeletes, Translatable, CascadeSoftDeletes;

    public $translatedAttributes = [
        'slug',
        'name',
        'description',
    ];
    protected $cascadeDeletes = ['translations'];
    protected $buttonsRouteNamePrefix = 'back.procedure_categories';
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

    public function procedures()
    {
        return $this->hasMany(Procedure::class, 'procedure_category_id');
    }
}
