<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //bulk data edit or submit or update
    protected $fillable = [
        'name',
        'email',
        'password',
        'first_name',
        'last_name',
        'cv',
        'user_name',
        'address',
        'phone_no',
        'qualification',
        'employment_status',
        'country',
        'gender',
        'designation',
        'role_name',
        'skills',
        'description',
        'university',
        'profile_picture'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function roles()
    {
        return $this->belongsTo('App\Role');
    }
    public function jobs()
    {
        return $this->belongsToMany('App\Job');
    }
    public static function getEmployers()
    {
        return User::select('*')->where('role_name','!=','employer')->get();
    }
    // public function
}
