<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employer;
use Illuminate\Support\Facades\DB;
use App\Models\Job;
use App\Models\Company;
use App\Models\Application;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $activeJobs =
            Job::where(
                'employer_id',
                Auth::user()->id
            )->get();
        $jobIds = [];
        foreach ($activeJobs as $job) {
            array_push($jobIds, $job->id);
            $company = Company::where('id', $job->company_id)->first();
            $job['company'] = $company['name'];
        }
        $totalApplications = Application::select('*')->whereIn('job_id', $jobIds)->get();
        $totalApplicationsCount = $totalApplications->count();
        $uniqueCompanies = Job::select('company_id')->distinct()->where('employer_id', Auth::user()->id)->get()->count();
        return view('employer.dashboard', compact('totalApplications', 'totalApplicationsCount', 'activeJobs', 'uniqueCompanies'));
    }
    public function edit()
    {
        $skills = explode(',',Auth::user()->skills);
        $skillArray = [];
        foreach($skills as $skill) {
            $query= DB::table('skills')->where('id',$skill)->get()[0];
            $data['id']=$query->id;
            $data['name']=$query->name;
            array_push($skillArray,$data);
        }
        $qualifications = DB::table('qualifications')->get()->toArray();
        $skills = DB::table('skills')->whereNotIn('id',$skills)->get();
        return view('employer.profile.edit',compact('skills','skillArray','qualifications'));
    }
    public function home()
    {
        return view('employer.welcome');
    }
}
