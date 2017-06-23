<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class Admin
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

        if (Auth::check()) {
            # code...
            if (Auth::user()->isadmin() && Auth::user()->isactive()) {
                # code...
                 return $next($request);
            }else{
                    return redirect('/')->with('message','You are not allowed here Thanks');
                }
        }
            return redirect('/login');
        
       
    }
}
