<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;


class UserLoginAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->path()=='/'&&$request->session()->has('user'))
        {
            return redirect('/userapp');
        }
        return $next($request);
    }
}
