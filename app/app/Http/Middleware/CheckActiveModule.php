<?php

namespace App\Http\Middleware;

use Closure;

class CheckActiveModule
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
        /*$route_name = $request->route()->getName();

        $module_route = str_replace_first(locale().'.', '', $route_name);

        if($module_for_request = \App\Models\Cms\Module::where('backend_route', $module_route)->first()){
            if(!$module_for_request->is_active){
                abort(404);
            }
        }

        dd(['Im middleware CheckActiveModule', $route_name, $module_route, $module_for_request]);

        */

        return $next($request);
    }
}
