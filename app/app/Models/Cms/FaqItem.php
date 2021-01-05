<?php

namespace App\Models\Cms;

use App\Models\BaseModel;
use App\Models\Traits\UpdaterTrait;
use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;

class FaqItem extends BaseModel
{
    use SoftDeletes, Translatable, UpdaterTrait, CascadeSoftDeletes;

    public $translatedAttributes = [
        'question',
        'answer',
        'image',
        'thumb',
    ];
    protected $cascadeDeletes = ['translations'];
    protected $buttonsRouteNamePrefix = 'back.faq_items';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'order',
        'is_active',
        'faq_category_id',
        'menu_id',
    ];

    public function setOrderAttribute($value)
    {
        $this->attributes['order'] = $value ?? 0;
    }

    public function scopeNextItem($query, $faq_item)
    {
        return $query->orderBy('order')->orderBy('id')
            ->where('id', '>', $faq_item->id);
    }

    public function scopePreviewsItem($query, $faq_item)
    {
        return $query->orderBy('order', 'DESC')->orderBy('id', 'DESC')
            ->where('id', '<', $faq_item->id);
    }

    public function scopeInCategory($query, $faq_item)
    {
        return $query->where('faq_category_id', $faq_item->faq_category_id);
    }

    public function scopeFrontFilter($query, $request, $menu_id)
    {
        $query->whereIsActive(true)
            ->whereMenuId($menu_id);

        if ($request->category) {
            $query->where('faq_category_id', $request->category);
        }

        if ($request->keywords) {
            $keywords = $request->keywords;

            $query->whereHas('translations', function ($query) use ($keywords) {
                $query->whereLocale(locale())->where(function ($query) use ($keywords) {
                    $query->where('question', config('cms.sql.like'), '%' . $keywords . '%')
                        ->orWhere('answer', config('cms.sql.like'), '%' . $keywords . '%');
                });
            });
        }

        return $query->orderBy('order')->paginate(config('cms.front_pagination.faqs'));
    }

    // belongsTo Relationships

    public function category()
    {
        return $this->belongsTo(FaqCategory::class, 'faq_category_id');
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }
}
