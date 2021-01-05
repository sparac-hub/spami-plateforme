<?php

namespace App\Models\Cms;

use App\Models\BaseModel;
use App\Models\Traits\UpdaterTrait;
use Dimsav\Translatable\Translatable;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Iatstuti\Database\Support\CascadeSoftDeletes;

class MediaFile extends BaseModel implements HasMedia
{
    use SoftDeletes, Translatable, UpdaterTrait, HasMediaTrait, CascadeSoftDeletes;

    const IMAGE = 'image_type';
    const VIDEO = 'video_type';
    public $translatedAttributes = [
        'slug',
        'name',
        'description',
    ];
    protected $cascadeDeletes = ['translations'];
    protected $buttonsRouteNamePrefix = 'back.media_files';
    protected $dates = [
        'deleted_at',
    ];

    protected $fillable = [
        'is_active',
        'order',
        'type',
        'url',
        'menu_id',
        'media_album_id',
    ];

    public function getHtmlTag($width = null, $height = null)
    {
        if ($this->type == static::IMAGE) {
            return '<img src="' . $this->url . '" width="' . $width . '" height="' . $height . '">';
        }

        return '<video width="' . $width . '" height="' . $height . '" controls>
                    <source src="' . $this->url . '" type="video/mp4">
                        Your browser does not support the video tag.
                </video>';
    }

    // belongsTo Relationships

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }

    public function album()
    {
        return $this->belongsTo(MediaAlbum::class, 'media_album_id');
    }
}
