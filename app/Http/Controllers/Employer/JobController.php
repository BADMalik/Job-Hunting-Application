<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\User;
use App\Models\Application;
// use Dotenv\Validator;
use App\Models\Company;
use App\Rules\StatusRule;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StatusRequest;
use Illuminate\Contracts\Session\Session;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $skills = DB::table('skills')->get();
        $companies = DB::table('companies')->where('owner_id', Auth::user()->id)->get();

        // dd($company_id);
        return view('employer/job/create', compact('skills', 'companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // $required
        // dd(json_encode($request->required_skills));
        // foreach($request->required_skills as $skill)
        // {

        // }
        $validator = Validator::make($request->all(), [
            'title' => ['required', 'string', 'max:30', 'min:5'],
            'description' => ['required', 'string', 'max:100', 'min:5'],
            'position' => ['required', 'string', 'max:255'],
            'experience' => ['required', 'integer'],
            'required_skills' => ['required'],
            'designation_category' => ['required'],
            'location' => ['required'],
            'company_id' => ['required'],
            'employer_id' => ['required']
        ]);
        ($request->merge(['required_skills' => json_encode($request->required_skills)]));
        // dd($validator->errors());
        if ($validator->errors()->count() > 0) {

            return back()->withErrors($validator->errors());
        }

        $jobcreated =  Job::create($request->except('_token', '_method'));
        return redirect()->route('employer.dashboard');
        //    dd($jobcreated);
        //    dd($request);0
    }
    public function applications(Request $request, $id)
    {
        $applications = DB::table('applications')->select('*')->where(array('job_id'=> $request->id))->get();
        // dd($applications);
        $job = Job::select('*')
            ->where(['id' => $request->id, 'employer_id' => Auth::user()->id])
            ->get()[0];
        // dd($job);
        foreach ($applications as $application) {
            $application->applicant = DB::table('users')->select('*')->where('id', $application->applicant_id)->get();
        }
        // dd($ap);
        // dd($applications);
        $skills = json_decode($job->required_skills);
        $skills = DB::table('skills')->select('*')->whereIn('id', $skills)->get();
        // dd($skills);

        return  view('employer.job.applications', compact('applications', 'skills', 'job'));
        // dd($job->all());
    }
    public function application(Request $request, $id)
    {
        $application = DB::table('applications')->select('*')->where('id', $id)->get()[0];

        // dd($application);
        $applicant = DB::table('users')->select('*')->where('id', $application->applicant_id)->get()[0];
        $skills = '';

        $skillIndeces = (explode(',', $applicant->skills));
        // dd($skillIndeces);
        foreach ($skillIndeces as $skill) {
            // dd(((int)($skill)));
            $fetchedSkill =   DB::table('skills')->select('*')->where('id', (int)$skill)->get()[0];
            $skills .= $fetchedSkill->name . ', ';
        }
        $skills = rtrim($skills, ' ,');

        return view('employer.job.application', compact('application', 'applicant', 'skills'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    public function updateStatus(Request $request,$id)
    {
            // dd($id);
        $application=Application::find($id);
        $application->update(['status'=>$request->status]);
        return back()->with('status',"Status Update SuccessFul");
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(job $job)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit(job $job)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, job $job)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(job $job)
    {
        //
    }
    public function companyJobs(Request $request,$id)
    {
            $jobs = Job::getCompanyJobs($id);
            // dd($jobs);
            return view('employer.company.jobs',compact('jobs'));
        // dd($id);
    }
    public function companyJob(Request $request, $id)
    {
            $job=Job::getJob($id);
            $jobPoster= Job::getPoster($id);
            return view('employer.company.job',compact('job','jobPoster'));
            // dd($job);
    }
    public function editCompanyJob(Request $request,$id)
    {
            $job=Job::getJob($id);
            $jobPoster= Job::getPoster($id);
            return view('employer.job.edit',compact('job','jobPoster'));
    }
}
