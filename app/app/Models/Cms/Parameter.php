<?php

namespace App\Models\Cms;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Parameter extends BaseModel
{
    use SoftDeletes;

    protected $buttonsRouteNamePrefix = 'back.parameters';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'reference',
        'value',
        'module_id',
        'parameter_group_id',
    ];

    // belongsTo Relationships

    public function parameter_group()
    {
        return $this->belongsTo(ParameterGroup::class, 'parameter_group_id');
    }

    public function module()
    {
        return $this->belongsTo(Module::class, 'module_id');
    }
}
