<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Roles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$role)
    {
        if(Auth::check()){
            if(Auth::user()->role_id == config('roles.'.$role))
                return $next($request);
        }
        return redirect()->route('home');
    }
    public function terminate($request,$response){

    }
}
