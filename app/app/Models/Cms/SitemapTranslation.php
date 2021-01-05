<?php

namespace App\Models\Cms;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class SitemapTranslation extends BaseModel
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'sitemap_id',
        'locale',
        'slug',
        'title',
        'description',
    ];

    public function sitemap()
    {
        return $this->belongsTo(Sitemap::class, 'sitemap_id');
    }
}
