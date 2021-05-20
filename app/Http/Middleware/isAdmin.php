<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isAdmin
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

        if(Auth::User()->role_id == 1){
            return $next($request);
        }else{
            return redirect()->route('dashboard')->with('error','page ne marche pas...'); //redirect()->back(); 
        }


        return $next($request);
    }
}
