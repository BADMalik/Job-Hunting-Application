<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Job;
use App\Models\Company;
use App\Models\User;
use App\Models\Application;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function index()
    {

        $activeJobs= (Job::allJobs());
        $users = User::all();
        $employers = User::getEmployers();
        $companies = Company::all();
        return view('candidate.dashboard',compact('activeJobs','users','employers','companies'));
    }
    public function edit()
    {
        $skills = explode(',',Auth::user()->skills);
        $skillArray = [];
        foreach($skills as $skill)
        {
            $query= DB::table('skills')->where('id',$skill)->get()[0];
            // dd($query);
            $data['id']=$query->id;
            $data['name']=$query->name;
            array_push($skillArray,$data);
        }
        $qualifications = DB::table('qualifications')->get()->toArray();
        $skills = DB::table('skills')->whereNotIn('id',$skills)->get();
        return view('candidate.profile.edit',compact('skills','skillArray','qualifications'));
    }
    public function home()
    {
        return view('candidate.welcome');
    }
}
