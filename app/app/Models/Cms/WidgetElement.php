<?php

namespace App\Models\Cms;

use App\Models\BaseModel;
use App\Models\Traits\UpdaterTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class WidgetElement extends BaseModel
{
    use SoftDeletes, UpdaterTrait;

    protected $dates = ['deleted_at'];

    // belongsTo Relationships

    protected $fillable = [
        'widget_id',
        'widget_element_id',
        'is_active',
        'order',
    ];

    public function widget()
    {
        return $this->belongsTo(Widget::class, 'widget_id');
    }
}
