<?php

namespace App\Models\Cms;

use App\Models\BaseModel;
use App\Models\Cms\ProgramAspim;
use App\Models\Traits\UpdaterTrait;
use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;

class Program extends BaseModel
{
    use SoftDeletes, Translatable, UpdaterTrait, CascadeSoftDeletes;

    public $translatedAttributes = [
        'title',
        'description',
    ];
    protected $cascadeDeletes = ['translations'];
    protected $buttonsRouteNamePrefix = 'back.programs';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'menu_id',
        'is_active',
        'order',
        'page_id',
        'established_at',
    ];

    public function getFullUrlAttribute()
    {
        return "{$this->protocol}{$this->url}";
    }

    public function scopeFrontFilter($query, $request, $menu_id)
    {
        $query->whereIsActive(true)->whereMenuId($menu_id);

        if ($request->keywords) {
            $keywords = $request->keywords;

            $query->whereHas('translations', function ($query) use ($keywords) {
                $query->whereLocale(locale())->where(function ($query) use ($keywords) {
                    $query->where('title', config('cms.sql.like'), '%' . $keywords . '%');
                });
            });
        }

        return $query->orderBy('order')->paginate(config('cms.front_pagination.programs'));
    }

    // belongsTo Relationships

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }

    public function aspims()
    {
        return $this->hasMany(ProgramAspim::class);
    }
}
