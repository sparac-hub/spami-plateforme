<?php

namespace App\Models\Cms;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class MapLayerTranslation extends BaseModel
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'map_layer_id',
        'locale',
        'name',
        'description',
    ];

    // belongsTo Relationships

    public function map_layer()
    {
        return $this->belongsTo(MapLayer::class, 'map_layer_id');
    }
}
