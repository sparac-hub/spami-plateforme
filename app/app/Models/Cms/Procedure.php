<?php

namespace App\Models\Cms;

use App\Models\BaseModel;
use App\Models\Traits\UpdaterTrait;
use Carbon\Carbon;
use Dimsav\Translatable\Translatable;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Iatstuti\Database\Support\CascadeSoftDeletes;

class Procedure extends BaseModel implements HasMedia
{
    use SoftDeletes, Translatable, UpdaterTrait, HasMediaTrait, CascadeSoftDeletes;

    public $translatedAttributes = [
        'name',
        'meta_description',
    ];
    protected $cascadeDeletes = ['translations'];
    protected $buttonsRouteNamePrefix = 'back.procedures';
    protected $dates = [
        'deleted_at',
        'publication_date',
    ];

    protected $fillable = [
        'order',
        'is_active',
        'procedure_category_id',
        'aspim',
        'menu_id',
        'publication_date',
    ];

    public function setOrderAttribute($value)
    {
        $this->attributes['order'] = $value ?? 0;
    }

    public function scopeNextItem($query, $procedure)
    {
        return $query->orderBy('order')->orderBy('id')
            ->where('id', '>', $procedure->id);
    }

    public function scopePreviewsItem($query, $procedure)
    {
        return $query->orderBy('order', 'DESC')->orderBy('id', 'DESC')
            ->where('id', '<', $procedure->id);
    }

    public function scopeInCategory($query, $procedure)
    {
        return $query->where('procedure_category_id', $procedure->procedure_category_id);
    }

    // belongsTo Relationships

    public function category()
    {
        return $this->belongsTo(ProcedureCategory::class, 'procedure_category_id');
    }

    public function aspim_data()
    {
        return $this->belongsTo(Aspim::class, 'aspim');
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }

    public function scopeFrontFilter($query, $request, $menu_id)
    {
        $query->whereIsActive(true)
            ->whereMenuId($menu_id)
            ->with(['aspim_data', 'aspim_data.countries']);

        if ($request->keywords) {
            $keywords = $request->keywords;

            $query->whereHas('translations', function ($query) use ($keywords) {
                $query->whereLocale(locale())->where(function ($query) use ($keywords) {
                    $query->where('name', config('cms.sql.like'), '%' . $keywords . '%');
                });
            });
        }

        if ($request->aspim) {
            $query->where('aspim', config('cms.sql.like'), '%' . $request->aspim . '%');
        }

        if ($request->date) {
            $query->whereYear('publication_date', $request->date);
        }

        if ($request->category_id) {
            $query->where('procedure_category_id', $request->category_id);
        }

        return $query->paginate(config('cms.front_pagination.procedures'));
    }
}
