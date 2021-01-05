<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;

class PermissionRouteNamesController extends Controller
{
    /**
     * Todo: CRUD for this model. This could be useful...
     *
     * Attach route names to permission
     *
     * App\Http\Middleware\CheckPermission: every time we access a route, we check if a permission is attached to it.
     *
     * !!!
     * => get_cached_permission_name_for_route_name($route_name)
     * Be careful: these data are cached: cache()->forget('permissions_route_names')
     *
     */

}