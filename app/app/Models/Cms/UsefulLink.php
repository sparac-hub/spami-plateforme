<?php

namespace App\Models\Cms;

use App\Models\BaseModel;
use App\Models\Traits\UpdaterTrait;
use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;

class UsefulLink extends BaseModel
{
    use SoftDeletes, Translatable, UpdaterTrait, CascadeSoftDeletes;

    public $translatedAttributes = [
        'title',
        'description',
    ];
    protected $cascadeDeletes = ['translations'];
    protected $buttonsRouteNamePrefix = 'back.useful_links';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'menu_id',
        'is_active',
        'order',
        'useful_link_category_id',
        'protocol',
        'url',
        'image',
    ];

    public function getFullUrlAttribute()
    {
        return "{$this->protocol}{$this->url}";
    }

    // belongsTo Relationships

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }

    public function category()
    {
        return $this->belongsTo(UsefulLinkCategory::class, 'useful_link_category_id');
    }

    public function scopeFrontFilter($query, $request, $menu_id)
    {
        $query->whereIsActive(true)
            ->whereMenuId($menu_id);

        if ($request->category) {
            $query->where('useful_link_category_id', $request->category);
        }

//        if ($request->keywords) {
//            $keywords = $request->keywords;
//
//            $query->whereHas('translations', function ($query) use ($keywords) {
//                $query->whereLocale(locale())->where(function ($query) use ($keywords) {
//                    $query->where('question', config('cms.sql.like'), '%' . $keywords . '%')
//                        ->orWhere('answer', config('cms.sql.like'), '%' . $keywords . '%');
//                });
//            });
//        }

        return $query->orderBy('order')->paginate(config('cms.front_pagination.useful-links'));
    }
}
