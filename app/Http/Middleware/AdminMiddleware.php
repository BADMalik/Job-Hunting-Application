<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next,String $role)
    {

        // dd(Auth::user());
        if(auth::check() && Auth::user()->role_name == $role)
        {
            return $next($request);
        }
        else
        {
//            return redirect()->route('home');
        }
        $redirectToRoute = Auth::user()->role_name.".home";

//            echo 'cant access anotehr router';
        return redirect()->route($redirectToRoute);

    }
}
