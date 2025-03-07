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
        // if (Auth::guard($guard)->check()) {
        //     return redirect('/home');
        // }

        // return $next($request);

        if ($request->is('blog_user/*')) {
            if(Auth::guard('blog_user')->check())
            {
                return redirect()->route('blog_user.home');
            }
        }
        else if(Auth::guard($guard)->check())
        {
            return redirect('/home');
        }

        return $next($request);
    }
}
