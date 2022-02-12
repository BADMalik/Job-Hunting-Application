<?php

namespace App\Http\Controllers\Candidate;

use App\Models\Job;
use App\Models\Application;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
        public function index(Request $request)
        {
            $applications = (Application::getAllApplications(Auth::user()->id));
            // dd($applications['reviewed']);
            return view('candidate.applications.applications',compact('applications'));
        }
        public function create(Request $request)
        {
            $prefix = rand(10,10000);
            $request->file('application_cv')->move(public_path('cv'), str_replace(' ','',$prefix.$request->file('application_cv')->getClientOriginalName()));
            $alreadyApplied = Application::where(
                'applicant_id',Auth::user()->id)->where(
                'job_id',$request->job_id)->get();
//                 if ($result->first()) { }
                    // if (!$result->isEmpty()) { }
                    // if ($result->count()) { }
                    // if (count($result)) { }
            if(!$alreadyApplied->isEmpty()) {
                return redirect()->route('candidate.dashboard')->with('job_already_submitted_status','You have already submitted your application for this job');
            }
            Application::create([
                'title'=>Auth::user()->name,
                'applicant_id' => Auth::user()->id,
                'description'=> 'set for future',
                'applicant_cv' => 'cv/'.str_replace(' ','',$prefix.$request->file('application_cv')->getClientOriginalName()),
                'designation_category' => Job::Find($request->job_id)->first()->designation_category,
                'job_id' => $request->job_id,
                'status' => 'submitted'
            ]);
            return redirect()->route('candidate.dashboard')->with('job_success_status','You have successfully submitted your application');
        }
}
