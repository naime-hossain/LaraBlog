<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class Subscriber
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
            if (Auth::user()->issubscriber() || Auth::user()->isauthor() ||Auth::user()->isadmin()  && Auth::user()->isactive()) {
                # code...
                 return $next($request);
            }else{
                return redirect('/')->with('message','Your account is not active wait for activation Thanks');
            }
        }
            return redirect('/login');
    }
}
