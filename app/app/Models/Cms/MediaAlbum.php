<?php

namespace App\Models\Cms;

use App\Models\BaseModel;
use App\Models\Traits\UpdaterTrait;
use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;

class MediaAlbum extends BaseModel
{
    use SoftDeletes, Translatable, UpdaterTrait, CascadeSoftDeletes;

    public $translatedAttributes = [
        'slug',
        'name',
        'description',
    ];
    protected $cascadeDeletes = ['translations'];
    protected $buttonsRouteNamePrefix = 'back.media_albums';
    protected $fillable = [
        'media_album_category_id',
        'menu_id',
        'is_active',
        'url',
        'order',
    ];

    protected $dates = ['deleted_at'];

    // belongsTo Relationships

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }

    // hasMany Relationships

    public function category()
    {
        return $this->belongsTo(MediaAlbumCategory::class, 'media_album_category_id');
    }

    public function files()
    {
        return $this->hasMany(MediaFile::class, 'media_album_id');
    }

    public function images()
    {
        return $this->hasMany(MediaFile::class, 'media_album_id')->whereType(MediaFile::IMAGE);
    }

    public function videos()
    {
        return $this->hasMany(MediaFile::class, 'media_album_id')->whereType(MediaFile::VIDEO);
    }

    public function news()
    {
        return $this->hasMany(News::class, 'media_album_id');
    }
}
