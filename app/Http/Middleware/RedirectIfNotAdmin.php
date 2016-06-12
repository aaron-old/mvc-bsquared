<?php
/**
 * Created by PhpStorm.
 * User: Aaron Young
 * Date: 6/11/2016
 * Time: 10:57 PM
 */

namespace Bsquared\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotAdmin
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
        if (!Auth::guard($guard)->check()) {
            return redirect('/admin/login');
        }
        return $next($request);
    }
}