<?php

namespace App\Models\Cms;

use Carbon\Carbon;
use App\Models\BaseModel;
use App\Models\Traits\UpdaterTrait;
use Dimsav\Translatable\Translatable;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Iatstuti\Database\Support\CascadeSoftDeletes;

class OutilGestion extends BaseModel implements HasMedia
{
    use SoftDeletes, Translatable, UpdaterTrait, HasMediaTrait, CascadeSoftDeletes;

    const GUIDELINE = 'guideline_type';
    const VIDEO = 'video_type';
    const LIEN = 'lien_type';
    const MANUEL = 'manuel_type';
    public $translatedAttributes = [
        'slug',
        'name',
        'meta_title',
        'meta_description',
        'type',
        'url_video',
        'url_lien',
    ];
    protected $cascadeDeletes = ['translations'];
    protected $buttonsRouteNamePrefix = 'back.outil_gestions';
    protected $dates = [
        'deleted_at',
    ];

    protected $fillable = [
        'is_active',
        'menu_id',
        'aspim_id',
        'outil_gestion_category_id',
    ];

    // belongsTo Relationships

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }

    public function category()
    {
        return $this->belongsTo(OutilGestionCategory::class, 'outil_gestion_category_id');
    }

    public function aspim()
    {
        return $this->belongsTo(Aspim::class, 'aspim_id');
    }

    // scopes
    public function scopeFrontFilter($query, $request, $menu_id)
    {
        $query->whereIsActive(true)
            ->whereMenuId($menu_id)
            ->withTranslation()
            ->with(['menu']);

        if ($request->category) {
            $type = $request->category;

            $query->whereHas('translations', function ($query) use ($type) {
                $query->whereLocale(locale())->where(function ($query) use ($type) {
                    $query->where('type', $type);
                });
            });
        }

        if ($request->aspim) {
            $query->where('aspim_id', $request->aspim);
        }

        if ($request->keywords) {
            $keywords = $request->keywords;

            $query->whereHas('translations', function ($query) use ($keywords) {
                $query->whereLocale(locale())->where(function ($query) use ($keywords) {
                    $query->where('name', config('cms.sql.like'), '%' . $keywords . '%');
                });
            });
        }

        return $query->paginate(10);
    }
}
