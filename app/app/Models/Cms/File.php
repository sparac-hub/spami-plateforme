<?php

namespace App\Models\Cms;

use App\Models\BaseModel;
use App\Models\Traits\UpdaterTrait;
use Dimsav\Translatable\Translatable;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Iatstuti\Database\Support\CascadeSoftDeletes;

class File extends BaseModel implements HasMedia
{
    use SoftDeletes, Translatable, UpdaterTrait, HasMediaTrait, CascadeSoftDeletes;

    public $translatedAttributes = [
        'name',
        'description',
    ];
    protected $cascadeDeletes = ['translations'];
    protected $buttonsRouteNamePrefix = 'back.files';
    protected $dates = [
        'deleted_at',
        'publication_date',
    ];

    protected $fillable = [
        'order',
        'is_active',
        'file_category_id',
        'menu_id',
        'path',
        'extension',
        'size',
        'publication_date',
    ];

    public function setOrderAttribute($value)
    {
        $this->attributes['order'] = $value ?? 0;
    }

    public function scopeNextItem($query, $file)
    {
        return $query->orderBy('order')->orderBy('id')
            ->where('id', '>', $file->id);
    }

    public function scopePreviewsItem($query, $file)
    {
        return $query->orderBy('order', 'DESC')->orderBy('id', 'DESC')
            ->where('id', '<', $file->id);
    }

    public function scopeInCategory($query, $file)
    {
        return $query->where('file_category_id', $file->file_category_id);
    }

    // belongsTo Relationships

    public function category()
    {
        return $this->belongsTo(FileCategory::class, 'file_category_id');
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }

    public function scopeFrontFilter($query, $request, $menu_id)
    {
        $query->whereIsActive(true)
            ->whereMenuId($menu_id);

        if ($request->category) {
            $query->where('file_category_id', $request->category);
        }

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
