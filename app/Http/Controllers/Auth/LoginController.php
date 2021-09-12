<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo;
    public function redirectTo() {
        // dd(Auth::user());die;
        // var_dump('logincontroller=========================');die;
        // var_dump('admin is here btichers');die;

        $role = Auth::user()->role_name;
        // dd(Auth::user());
        switch ($role) {
          case 'admin':
            // var_dump('admin is here btichers');die;
            return '/admin/dashboard';
            break;
          case 'candidate':
            return '/candidate/dashboard';
            break;
          case 'employer':
            return '/employer/dashboard';
            break;

          default:
            return '/home';
          break;
        }
      }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // var_dump($_POST);die;
        // dd(Auth::user());die;
        // if(Auth::check() && Auth::user()->role_name=='admin')
        // {
        //     var_dump(Auth::user());die;
        //     return redirect('admin.dashboard');
        // }
        // else if(Auth::check() && Auth::user()->role_name=='candidate')
        // {
        //     return redirect('candidate.dashboard');
        // }
        // else if(Auth::check() && Auth::user()->role_name=='employer')
        // {
        //     return redirect('employer.dashboard');
        // }
        // $this->middleware('guest')->except('logout');
    }
}
