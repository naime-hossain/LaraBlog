<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class Author
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
            if (Auth::user()->isactive()) {
                        if ( Auth::user()->isauthor() || Auth::user()->isadmin()) {
                        # code...
                         return $next($request);
                    }else{
                        return redirect('/')->with('message','You are not allowed here');
                    }
            }else{
                return redirect('/')->with('message','Your account is not active wait for activation Thanks');
            }
            
        }
            return redirect('/login');
    }
}
