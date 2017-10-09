<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'admin')
    {
        switch ($guard) {
            case 'web':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('home');
                }
                break;

            default:
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('admin.home');
                }
                break;
        }

        return $next($request);
    }
}
