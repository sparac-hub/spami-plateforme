<?php

namespace App\Models\Cms;

use App\Models\BaseModel;

class PermissionRouteName extends BaseModel
{
    protected $table = 'permission_route_name';

    protected $fillable = [
        'permission_id',
        'route_name',
        'module_id',
        'is_active',
    ];

    public function permission()
    {
        return $this->belongsTo(Permission::class, 'permission_id');
    }
}
