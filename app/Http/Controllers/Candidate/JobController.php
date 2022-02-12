<?php

namespace App\Http\Controllers\Candidate;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    //
    public function index(Request $request,$id)
    {
        $job = Job::getJob($id);
        return view('candidate.job.view',compact('job'));
    }
    public function getShortlistedJobs()
    {
        $events = DB::table('events')
        ->select('events.*')
        ->join('applications',function($join){
            $join->on("events.applicant_id",'=','applications.id')
            ->on('events.job_id','=','applications.job_id')
            ->where('applications.applicant_id','=',Auth::user()->id);
        })->get();

        $link = DB::table('events')
        ->select('events.*','call_link_token.*')
        ->join('applications',function($join){
            $join->on("events.applicant_id",'=','applications.id')
            ->on('events.job_id','=','applications.job_id')
            ->where('applications.applicant_id','=',Auth::user()->id);
        })->join('call_link_token',function($join2){
            $join2->on('events.id','=','call_link_token.event_id');
        })->orderBy('call_link_token.id', 'DESC')->get();
        return view('candidate.applications.shortlisted',compact('events','link'));
    }
}
