<?php

namespace App\Models\Cms;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class MediaAlbumCategoryTranslation extends BaseModel
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'media_album_category_id',
        'locale',
        'slug',
        'name',
        'description',
    ];

    // belongsTo Relationships

    public function media_album_category()
    {
        return $this->belongsTo(MediaAlbumCategory::class, 'media_album_category_id');
    }
}
