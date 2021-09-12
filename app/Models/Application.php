<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Application extends Model
{
    public $fillable = ['status'];
    use HasFactory;
    public static function getApplicationsExceptShortlisted($id)
    {
        // dd($id);
//where('status','<>','shortlisted')->
        return Application::where('applicant_id','=',$id)->get();
    }
}
