<?php

namespace App\Models\Cms;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class TrainingTranslation extends BaseModel
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'training_id',
        'locale',
        'slug',
        'name',
        'description',
        'image',
        'content',
        'meta_title',
        'meta_description',
    ];

    // belongsTo Relationships

    public function training()
    {
        return $this->belongsTo(Training::class, 'training_id');
    }
}
