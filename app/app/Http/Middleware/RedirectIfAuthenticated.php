<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Services\Auth\RedirectionService;

class RedirectIfAuthenticated
{
    protected $redirectionService;

    public function __construct()
    {
        $this->redirectionService = new RedirectionService();
    }

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param string|null $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            if ($redirection_route_name = $this->redirectionService->getRedirectionUrlBasedOnRole(auth()->user())) {
                return redirect()->to($redirection_route_name);
            }

            return redirect(locale_prefix() . '/admin');
        }

        return $next($request);
    }
}
