<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;

use Closure;

class RedirectLocale
{

    protected $firstSegment;

    public function __construct(Request $request)
    {
        $this->firstSegment = $request->segment(1);
    }

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        /** !!!!!!!!!!!!!!!!!!!! **/
        return $next($request);


        $route_name = $request->route()->getName();

        if (app()->redirectDefaultLocale && !$this->segmentIsLocale($this->firstSegment)) {
            // if the url is: www.website.com/ OR www.website.com/something-different-from-locale  (Not: fr, en, ar..)
            if (!collect(['login', 'logout'])->contains($route_name)) {
                // redirect to: http://website.com/locale instead of: http://website.com
                /*
                 //config(['app.url' => config('app.url').'/fr']);
                 return redirect()
                    ->route($route_name, $request->route()->parameters());
                */
            }
        }

        return $next($request);
    }

    public function segmentIsLocale(string $requestSegment = null)
    {
        return collect(get_translatable_locales())->contains($requestSegment);
    }

}
