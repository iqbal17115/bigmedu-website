<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function redirectTo($request)
    {
        // if (! $request->expectsJson()) {
        //     return route('login');
        // }

        if ($request->is('blog_user/*')) {
            if(!Auth::guard('blog_user')->check())
            {
                return route('blog_user.login');
            }
            else if(!Auth::guard('web')->check())
            {
                return route('login');
            }
        }
    }
}
