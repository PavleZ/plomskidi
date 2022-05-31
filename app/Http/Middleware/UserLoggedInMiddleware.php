<?php

namespace App\Http\Middleware;

use Closure;

class UserLoggedInMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($request->session()->has('korisnik'))
            return $next($request);
        return redirect()->route('home');
    }
}
