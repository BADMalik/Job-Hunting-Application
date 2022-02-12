<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:10','min:3'],
            'last_name' => ['required', 'string', 'max:10','min:3'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone_no'=>['required', 'regex:/[0-9]{3}[0-9]{3}[0-9]{4}/','unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'university'=>['required'],
            'gender'=>['required'],
            'country'=>['required'],
            'role_name'=>['required'],
            'skills'=>['required'],
            'qualification'=>['required'],
            'username'=>['required','string','min:5'],
            'address'=>['required', 'string','min:5','max:100']
        ]);
        // var_dump($data);die;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
//         dd($data);
        $skills="";
        foreach($data['skills'] as $skill)
        {
            $skills.=$skill.",";
        }
        $skills=rtrim($skills,',');
        return User::create([
            'first_name' => $data['first_name'],
            'email' => $data['email'],
            'last_name'=>$data['last_name'],
            'address' => $data['address'],
            'phone_no' => $data['phone_no'],
            'name'=> $data['first_name'].' '.$data['last_name'],
            'user_name'=>$data['username'],
            'qualification'=>$data['qualification'],
            'university' => $data['university'],
            'country'=> $data['country'],
            'role_name'=>$data['role_name'],
            'password' => Hash::make($data['password']),
            'gender'=> $data['gender'],
            'skills'=>$skills,
            'employment_status'=>'unemployeed'

        ]);
    }
}
