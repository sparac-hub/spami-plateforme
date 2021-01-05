<?php

namespace App\Models\Cms;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class ParameterGroup extends BaseModel
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'reference',
        'name',
    ];

    // hasMany Relationships

    public function parameters()
    {
        return $this->hasMany(Parameter::class, 'parameter_group_id');
    }
}
