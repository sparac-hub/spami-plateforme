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

class Aspim extends BaseModel implements HasMedia
{
    use SoftDeletes, Translatable, UpdaterTrait, HasMediaTrait, CascadeSoftDeletes;

    public $translatedAttributes = [
        'name',
        'slug',
        'status',
        'schemas',
        'creation_text',
        'physical_features',
        'ecological_features',
        'threats_and_pressures',
        'teritory',
        'mediterranean_importance',
        'management_body',
        'geographic_position',
        'meta_title',
        'meta_description',
    ];
    protected $cascadeDeletes = ['translations'];
    protected $buttonsRouteNamePrefix = 'back.aspims';

    protected $dates = [
        'deleted_at',
    ];

    // Image & Gallerie & Document => Table Media
    // Countries List => aspims_countries table
    protected $fillable = [
        'website',
        'website_name',
        'included_at', // Année inclusion
        'total_surface', // Total surface
        'total_surface_marine', // Superficie marine
        'width', // Longeur de la cote principale
        'aspim_category_id', // Category
        'creation_date', // Date de création

        'geojson',
        'is_mpa',
        'mapamed_feature_id',
        'business_plan',

        'is_active',
        'menu_id',
    ];

    // belongsTo Relationships

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }

    public function category()
    {
        return $this->belongsTo(AspimCategory::class, 'aspim_category_id');
    }

    // hasMany Relationships

    public function procedures()
    {
        return $this->hasMany(Procedure::class, 'aspim');
    }

    public function countries()
    {
        return $this->belongsToMany(Country::class, AspimCountry::class, 'aspim_id');
    }

    // hasMany Relationships

    public function plans()
    {
        return $this->hasMany(Plan::class, 'aspim_id');
    }

    public function schemas()
    {
        return $this->hasMany(Schema::class, 'aspim_id');
    }

    // hasMany Relationships

    public function outil_gestions()
    {
        return $this->hasMany(OutilGestion::class, 'aspim_id');
    }

    // scopes
    public function scopeFrontFilter($query, $request, $menu_id)
    {
        $query->whereIsActive(true)->whereMenuId($menu_id);

        if ($request->included_at) {
            $query->where('included_at', $request->included_at);
        }

        if ($request->country) {
            $country_id = $request->country;
            $query->whereHas('countries', function ($query) use ($country_id) {
                $query->where('country_id', $country_id);
            });
        }

        if ($request->keywords) {
            $keywords = $request->keywords;

            $query->whereHas('translations', function ($query) use ($keywords) {
                $query->whereLocale(locale())->where(function ($query) use ($keywords) {
                    $query->where('name', config('cms.sql.like'), '%' . $keywords . '%')
                        ->orWhere('creation_text', config('cms.sql.like'), '%' . $keywords . '%');
                });
            });
        }
        //order
        //$query->join('aspim_translations as t', 't.aspim_id', '=', 'aspims.id');
        //$query->orderBy('name', 'ASC');

        return $query->paginate(config('cms.front_pagination.aspims'));
    }

    // scopes
    public function scopeFrontFilterMap($query, $request, $menu_id)
    {
        $query->whereIsActive(true)->whereMenuId($menu_id);

        if ($request->included_at) {
            $query->where('included_at', $request->included_at);
        }

        if ($request->country) {
            $country_id = $request->country;
            $query->whereHas('countries', function ($query) use ($country_id) {
                $query->where('country_id', $country_id);
            });
        }

        if ($request->keywords) {
            $keywords = $request->keywords;

            $query->whereHas('translations', function ($query) use ($keywords) {
                $query->whereLocale(locale())->where(function ($query) use ($keywords) {
                    $query->where('name', config('cms.sql.like'), '%' . $keywords . '%');
                });
            });
        }

        return $query->get();
    }
}
