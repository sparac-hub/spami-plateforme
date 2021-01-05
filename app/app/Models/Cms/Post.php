<?php

namespace App\Models\Cms;

use App\Models\BaseModel;
use App\Models\Traits\UpdaterTrait;
use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;

class Post extends BaseModel
{
    use SoftDeletes, Translatable, UpdaterTrait, CascadeSoftDeletes;

    public $translatedAttributes = [
        'title',
        'slug',
        'content',
        'meta_title',
        'meta_description',
    ];
    protected $buttonsRouteNamePrefix = 'back.posts';
    protected $cascadeDeletes = ['translations'];
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'post_category_id',
        'order',
        'is_active',
    ];

    // belongsTo Relationships

    public function post_category()
    {
        return $this->belongsTo(PostCategory::class, 'post_category_id');
    }
}
