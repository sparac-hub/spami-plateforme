<?php

namespace App\Models\Cms;

use Spatie\Permission\Models\Permission as SpatiePermission;

class Permission extends SpatiePermission
{
    public function module()
    {
        return $this->belongsTo(Module::class, 'module_id');
    }
}
