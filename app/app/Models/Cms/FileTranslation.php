<?php

namespace App\Models\Cms;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class FileTranslation extends BaseModel
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'description',
    ];
}
