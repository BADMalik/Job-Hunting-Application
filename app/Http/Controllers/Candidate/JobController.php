<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
class JobController extends Controller
{
    //
    public function index(Request $request,$id)
    {
        $job = Job::getJob($id);
        // dd($job);
        return view('candidate.job.view',compact('job'));
    }
}
