<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;
        // dd($guards);die;
        // dd($request);die;
        // var_dump("redirectifauthe================================");die;
        // var_dump(Auth::user());die;
        // dd($guards);
        foreach ($guards as $guard) {
            // dd(Auth::guard());
            if (Auth::guard($guard)->check()) {
                $role = Auth::user()->role_name;
                //  dd($role);
                switch ($role) {
                    case 'admin':
                        return redirect('/admin/dashboard');
                        break;
                    case 'candidate':
                        return redirect('/candidate/dashboard');
                        break;
                    case 'employer':
                        // dd($role);
                        return redirect('/employer/dashboard');
                        break;

                    default:
                        //                        if($role=='candidate')
                        //                        {
                        //                            return redirect('/candidate/dashboard');
                        //                            break;
                        //                        }
                        //                        if($role=='employer')
                        //                        {
                        //                            return redirect('/employer/dashboard');
                        //                            break;
                        //                        }
                        //                        if($role=='admin')
                        //                        {
                        //                            return redirect('/admin/dashboard');
                        //                            break;
                        //                        }
                        //                        $string = Au
                        // return ('adw');
                }
            }
        }
        // if(Auth::check())

        return $next($request);
    }
}
