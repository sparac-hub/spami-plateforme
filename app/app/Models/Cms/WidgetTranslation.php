<?php

namespace App\Models\Cms;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class WidgetTranslation extends BaseModel
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'widget_id',
        'locale',
        'name',
        'description',
        'button_title',
    ];

    // belongsTo Relationships

    public function module()
    {
        return $this->belongsTo(Widget::class, 'widget_id');
    }
}
