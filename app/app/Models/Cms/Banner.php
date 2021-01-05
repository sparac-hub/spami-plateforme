<?php

namespace App\Models\Cms;

use App\Models\BaseModel;
use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;

class Banner extends BaseModel
{
    use SoftDeletes, Translatable, CascadeSoftDeletes;

    const TYPE_IMAGE = "image_file";
    const TYPE_VIDEO = "video_file";
    const TYPE_SCRIPT = "script";
    const TYPE_HTML = "html";
    public $translatedAttributes = [
        'back_office_title',
        'banner_id',
        'locale',
        'title',
        'title_2',
        'description',
        'meta_title',
        'meta_description',
        'button_title',
        'link_type_id',
        'link_target',
        'http_protocol',
        'external_link',
        'internal_link',
        'menu_id',
    ];
    protected $buttonsRouteNamePrefix = 'back.banners';
    protected $cascadeDeletes = ['translations'];
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'image_filepath',
        'video_filepath',
        'script',
        'width',
        'height',
        'type',
        'thumb',
        'css_class',
        'is_for_mobile',
        'is_active',
    ];
}
