<?php

namespace App\Models\Cms;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class BannerTranslation extends BaseModel
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'banner_id',
        'locale',
        'title',
        'title_2',
        'description',
        'meta_title',
        'meta_description',
        'button_title',
        'back_office_title',
        'link_type_id',
        'link_target',
        'http_protocol',
        'external_link',
        'internal_link',
        'menu_id',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function banner()
    {
        return $this->belongsTo(Banner::class, 'banner_id');
    }
}
