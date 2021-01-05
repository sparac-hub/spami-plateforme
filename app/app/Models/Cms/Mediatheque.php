<?php

namespace App\Models\Cms;

use App\Models\BaseModel;
use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;

class Mediatheque extends BaseModel
{
    use SoftDeletes, Translatable, CascadeSoftDeletes;

    public $translatedAttributes = [
        'mediatheque_id',
        'locale',
        'title',
        'title_2',
        'description',
        'meta_title',
        'meta_description',
        'button_title',
        'back_office_title',
    ];
    protected $cascadeDeletes = ['translations'];
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'image_filepath',
        'video_filepath',
        'script',
        'http_protocol',
        'link_type',
        'link_target',
        'external_link',
        'internal_link',
        'width',
        'height',
        'type',
        'thumb',
        'css_class',
        'is_for_mobile',
        'is_active',
    ];
}
