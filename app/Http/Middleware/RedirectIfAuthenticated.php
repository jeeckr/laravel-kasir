<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (auth()->guard('admin')->check()) {
            return redirect()->route('dashboard_admin');
        }

        if (auth()->guard('employee')->check()) {
            return redirect()->route('dashboard_employee');
        }

        return $next($request);
    }
}
