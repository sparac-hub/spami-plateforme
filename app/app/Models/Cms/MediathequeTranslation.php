<?php

namespace App\Models\Cms;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class MediathequeTranslation extends BaseModel
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function mediatheque()
    {
        return $this->belongsTo(Mediatheque::class, 'mediatheque_id');
    }
}
