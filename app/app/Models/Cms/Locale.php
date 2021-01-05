<?php

namespace App\Models\Cms;

use App\Models\BaseModel;
use App\Models\Traits\UpdaterTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Locale extends BaseModel
{
    use SoftDeletes, UpdaterTrait;

    protected $buttonsRouteNamePrefix = 'back.locales';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'reference',
        'name',
        'is_default',
        'is_active',
        'is_rtl',
    ];
}
