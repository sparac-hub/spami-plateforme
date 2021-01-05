<?php

namespace App\Models\Cms;

use App\Models\BaseModel;
use App\Models\Traits\UpdaterTrait;
use Dimsav\Translatable\Translatable;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Iatstuti\Database\Support\CascadeSoftDeletes;

class News extends BaseModel implements HasMedia
{
    use SoftDeletes, Translatable, UpdaterTrait, HasMediaTrait, CascadeSoftDeletes;

    public $translatedAttributes = [
        'slug',
        'name',
        'description',
        'image',
        'pays'
        /*        'content',
                'meta_title',
                'meta_description',*/
    ];
    protected $cascadeDeletes = ['translations'];
    protected $buttonsRouteNamePrefix = 'back.news';
    protected $dates = [
        'deleted_at',
        'start_date',
        'end_date',
    ];

    protected $fillable = [
        'is_active',
        'menu_id',
        'news_category_id',
        'media_album_id',
        'start_date',
        'end_date',
    ];

    public function scopeFrontFilter($query, $request, $menu)
    {
        $query->where([
            'is_active' => 1,
            'menu_id' => $menu->id,
        ])
            ->withTranslation()
            ->with(['menu']);

        if ($request->keywords) {
            $keywords = $request->keywords;

            $query->whereHas('translations', function ($query) use ($keywords) {
                $query->whereLocale(locale())->where(function ($query) use ($keywords) {
                    $query->where('name', config('cms.sql.like'), '%' . $keywords . '%')
                        ->orWhere('description', config('cms.sql.like'), '%' . $keywords . '%');
                });
            });
        }

        if ($request->category_id) {
            $query->where('news_category_id', $request->category_id);
        }


        if ($request->start_date) {

            $query->whereDate('start_date', '>=', $request->start_date);
        }
        return $query->paginate(config('cms.front_pagination.news'));
    }

    // belongsTo Relationships

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }

    public function category()
    {
        return $this->belongsTo(NewsCategory::class, 'news_category_id');
    }

    public function media_album()
    {
        return $this->belongsTo(MediaAlbum::class, 'media_album_id');
    }
}
