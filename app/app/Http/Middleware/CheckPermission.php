<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Get the current route
        $route_name = $request->route()->getName();

        // If there is permission for the current route name:
        // Reset cached roles and permissions:
        // app()['cache']->forget('spatie.permission.cache'); // TODO: Remove this to activate cache
        if ($permission_name = get_cached_permission_name_for_route_name($route_name)) {
            if (!$request->user()->hasPermissionTo($permission_name)) {
                abort(403);
            }
        }

        return $next($request);
    }

}

