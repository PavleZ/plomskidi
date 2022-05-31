<?php

namespace App\Http\Middleware;

use Closure;

class AdminLoggedInMiddleware
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
        if($request->session()->has('korisnik') && $request->session()->get('korisnik')->uloga =='admin')
            return $next($request);
        return redirect()->route('home');
    }
}
