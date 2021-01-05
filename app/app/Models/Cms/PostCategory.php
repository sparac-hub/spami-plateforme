<?php

namespace App\Models\Cms;

use App\Models\BaseModel;
use App\Models\Traits\UpdaterTrait;
use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;

class PostCategory extends BaseModel
{
    use SoftDeletes, Translatable, UpdaterTrait, CascadeSoftDeletes;

    public $translatedAttributes = [
        'name',
        // Todo: add slug ? in PostCategory and PostCategoryTranslation
        'description',
    ];
    protected $buttonsRouteNamePrefix = 'back.post_categories';
    protected $cascadeDeletes = ['translations'];
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'menu_id',
        'order',
        'is_active',
    ];

    // hasMany Relationships

    public function posts()
    {
        return $this->hasMany(Post::class, 'post_category_id');
    }
}
