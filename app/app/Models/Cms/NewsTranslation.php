<?php

namespace App\Models\Cms;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class NewsTranslation extends BaseModel
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'news_id',
        'locale',
        'slug',
        'name',
        'description',
        'image',
        'pays',
        /*'content',
        'meta_title',
        'meta_description',*/
    ];

    // belongsTo Relationships

    public function news()
    {
        return $this->belongsTo(News::class, 'news_id');
    }
}
