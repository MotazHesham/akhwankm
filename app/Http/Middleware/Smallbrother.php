<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Smallbrother
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
        if(Auth::user()->user_type == 'staff'){ 
            return redirect()->route('admin.home');
        }elseif(Auth::user()->user_type == 'big_brother'){ 
            return redirect()->route('bigbrother.home');
        }
        return $next($request);
    }
}
