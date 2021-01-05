<?php

namespace App\Models\Cms;

use App\Models\BaseModel;
use App\Models\Traits\UpdaterTrait;
use Dimsav\Translatable\Translatable;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Iatstuti\Database\Support\CascadeSoftDeletes;

class Plan extends BaseModel implements HasMedia
{
    use SoftDeletes, Translatable, UpdaterTrait, HasMediaTrait, CascadeSoftDeletes;

    public $translatedAttributes = [
        'name',
        'description',
    ];
    protected $cascadeDeletes = ['translations'];
    protected $buttonsRouteNamePrefix = 'back.plans';
    protected $dates = [
        'deleted_at',
        'publication_date',
    ];

    protected $fillable = [
        'order',
        'is_active',
        'plan_category_id',
        'menu_id',
        'path',
        'extension',
        'size',
        'publication_date',
        'aspim_id'
    ];

    public function setOrderAttribute($value)
    {
        $this->attributes['order'] = $value ?? 0;
    }

    // belongsTo Relationships

    public function category()
    {
        return $this->belongsTo(PlanCategory::class, 'plan_category_id');
    }

    public function aspim()
    {
        return $this->belongsTo(Aspim::class, 'aspim_id');
    }


    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }

    public function scopeFrontFilter($query, $request, $menu_id)
    {
        $query->where('menu_id', $menu_id)->whereIsActive(true)
            ->withTranslation()
            ->with(['menu']);

        if ($request->keywords) {
            $keywords = $request->keywords;
            $query->whereHas('translations', function ($query) use ($keywords) {
                $query->whereLocale(locale())->where(function ($query) use ($keywords) {
                    $query->where('name', config('cms.sql.like'), '%' . $keywords . '%');
                });
            });
        }
        if ($request->aspim) {
            $query->where('aspim_id', $request->aspim);
        }

        return $query->paginate(20);
    }
}
