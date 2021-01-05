<?php

namespace App\Models\Cms;

use App\Models\BaseModel;
use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;

class Page extends BaseModel
{
    use SoftDeletes, Translatable, CascadeSoftDeletes;

    public $translatedAttributes = [
        'title',
        'content',
        'meta_title',
        'meta_description',
    ];
    protected $cascadeDeletes = ['translations'];
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'menu_id',
    ];

    // belongsTo Relationships

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }

    // Scopes

    /**
     * Create a new empty page with its translations for the given menu_id
     * @param $query
     * @param int $menu_id
     * @return $this
     */
    public function scopeCreateForMenuId($query, int $menu_id)
    {
        $page['menu_id'] = $menu_id;

        foreach (config('translatable.locales') as $locale) {
            // At least one column must be declared so the dimsav/translatable fills the translations table
            $page[$locale]['content'] = '';
        }

        $existent_page = Page::with('translations')->where('menu_id', $menu_id)->first();

        if (!$existent_page) {
            return Page::create($page);
        }

        return $existent_page->load('translations');
    }

    public function scopeActive($query)
    {
        return $query->whereHas('menu', function ($q) {
            $q->whereIsActive(true);
        });
    }
}
