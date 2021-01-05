<?php

namespace App\Models\Cms;

use App\Models\BaseModel;
use App\Models\Traits\UpdaterTrait;
use Dimsav\Translatable\Translatable;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Iatstuti\Database\Support\CascadeSoftDeletes;

class Schema extends BaseModel implements HasMedia
{
    use SoftDeletes, Translatable, UpdaterTrait, HasMediaTrait, CascadeSoftDeletes;

    public $translatedAttributes = [
        'name',
        'description',
    ];
    protected $cascadeDeletes = ['translations'];
    protected $buttonsRouteNamePrefix = 'back.schemas';
    protected $dates = [
        'deleted_at',
        'publication_date',
    ];

    protected $fillable = [
        'order',
        'is_active',
        'path',
        'extension',
        'size',
        'publication_date',
        'aspim_id',
    ];

    public function setOrderAttribute($value)
    {
        $this->attributes['order'] = $value ?? 0;
    }


    // belongsTo Relationships
    public function aspim()
    {
        return $this->belongsTo(Aspim::class, 'aspim_id');
    }

    public function scopeFrontFilter($query, $request)
    {
        $query->whereIsActive(true);

        if ($request->start_date) {
            $query->where('created_at', '>', $request->start_date);
        }

        if ($request->end_date) {
            $query->where('created_at', '<', $request->end_date);
        }

        //dd($query->toSql(), $query->getBindings());

        if ($request->keywords) {
            $keywords = $request->keywords;

            $query->whereHas('translations', function ($query) use ($keywords) {
                $query->whereLocale(locale())->where(function ($query) use ($keywords) {
                    $query->where('name', config('cms.sql.like'), '%' . $keywords . '%')
                        ->orWhere('description', config('cms.sql.like'), '%' . $keywords . '%');
                });
            });
        }

        return $query->orderBy('order')->paginate(config('cms.front_pagination.files'));
    }
}
