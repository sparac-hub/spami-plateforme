<?php

namespace App\Models\Cms;

use App\Models\BaseModel;
use App\Models\Traits\UpdaterTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class WidgetMenu extends BaseModel
{
    use SoftDeletes, UpdaterTrait;

    protected $fillable = [
        'widget_id',
        'menu_id',
    ];

    protected $dates = ['deleted_at'];

    // belongsTo Relationships

    public function widget()
    {
        return $this->belongsTo(Widget::class, 'widget_id');
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }
}
