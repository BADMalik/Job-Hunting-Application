<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CandidateMiddleware
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
        // dd($request);die;
        if(auth::check() && Auth::user()->role_name==$role)
        {
            return $next($request);
        }
        else
        {
            $redirectToRoute = Auth::user()->role_name.".home";
            dd($redirectToRoute);
            return redirect()->route($redirectToRoute);
        }
    }
}
