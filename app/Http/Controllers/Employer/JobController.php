<?php

namespace App\Http\Controllers\Employer;

use App\Models\Job;
use App\Models\User;
use App\Models\Event;
use App\Models\Company;
// use Dotenv\Validator;
use App\Rules\StatusRule;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\StatusRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Validator;

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
        return view('employer/job/create', compact('skills', 'companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

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
        if ($validator->errors()->count() > 0) {
            dd($validator->errors());
            return back()->withErrors($validator->errors());
        }

        $jobcreated =  Job::create($request->except('_token', '_method'));
        return redirect()->route('employer.dashboard');
    }
    public function applications(Request $request, $id)
    {
        $applications = DB::table('applications')->select('*')->where(array('job_id'=> $request->id))->get();

        $job = Job::select('*')
            ->where(['id' => $request->id, 'employer_id' => Auth::user()->id])
            ->get()[0];

        foreach ($applications as $application) {
            $application->applicant = DB::table('users')->select('*')->where('id', $application->applicant_id)->get();
        }
        $skills = json_decode($job->required_skills);
        $skills = DB::table('skills')->select('*')->whereIn('id', $skills)->get();


        return  view('employer.job.applications', compact('applications', 'skills', 'job'));

    }
    public function application(Request $request, $id)
    {

        $application = Application::find($id);

        $applicant = DB::table('users')->select('*')->where('id', $application->applicant_id)->get()[0];

        $skills = '';

        $skillIndeces = (explode(',', $applicant->skills));

        foreach ($skillIndeces as $skill) {
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

            return view('employer.company.jobs',compact('jobs'));

    }
    public function companyJob(Request $request, $id)
    {
            $job=Job::getJob($id);
            $jobPoster= Job::getPoster($id);
            return view('employer.company.job',compact('job','jobPoster'));

    }
    public function editCompanyJob(Request $request,$id)
    {
            $job=Job::getJob($id);
            $jobPoster= Job::getPoster($id);
            return view('employer.job.edit',compact('job','jobPoster'));
    }
    public function events()
    {
        $jobs =Job::where('employer_id',Auth::user()->id)->get();
        $jobs = $jobs->map(function($value,$key){
            $value->applications = Application::where('job_id',$value->id)->where('status','shortlisted')->get();

            $value->applications->map(function($value2,$key) use ($value){
                $value2->applicants = User::find($value2->applicant_id);
                return $value2;
            });
            return $value;
        });
        return view('employer.events.events',[
            'jobs' => $jobs,
            'events' => Event::where('user_id',Auth::user()->id)->where('applicant_id',0)->where('job_id',0)->get()
        ]);
    }
    public function getApplicants(Request $request)
    {
        $applications = Application::where('job_id',(int)$request->data)->where('status','shortlisted')->get();
        return response()->json([
            'applicants' =>$applications]);
    }
    public function fireEvent(Request $request) {
        $job_id = (int)$request->job_select;
        $event = Event::where('id',(int)$request->event_id)->first();
        $event->user_id = (int)$request->user_id;
        $event->applicant_id = (int)$request->select_applicant_hidden;
        $event->job_id = $job_id;
        $event->update();
        return redirect()->route('allevents')->with([
            'event'=>$event,
            "response"=>true,
            'status' => 'You Have successfully scheduled an interview with the candidate'
        ]);
    }
    public function getShortlistedEvents()
    {
        ///applicant id is actually the applications id we will fix it later if needed
        $events = DB::table('events')
        ->select(
                'applications.id as application_id',
                'applications.title as application_title',
                'events.id as event_id',
                'users.*',
                'events.end_date as event_end_date',
                'events.start_date as event_start_date',
                'events.user_id as event_user_id',
                'events.applicant_id as event_applicant_id',
                'events.application_id as event_application_id',
                'events.job_id as event_job_id',
                'events.text as event_title'
        )
        ->join('applications',function($join){
                $join->on('events.applicant_id','=','applications.id')
                ->where('applications.status','=','shortlisted');
        })->join('users',function($join2){
            $join2->on('users.id','=','applications.applicant_id');
        })
        ->get();
        return view('employer.events.interviews',compact('events'));
    }
    public function loadReactRoutePage(Request $request)
    {
        // dd($request->all());
        $app = Application::where('id',$request->interviewee)->get();
        return view('react.reactHome',[
            'interviewee' => $request->interviewee,
            'event_name' => $request->event_name,
            'event_id'=>$request->event_id,
            'application' => $app
        ]);
    }
    public function sendlink(Request $request)
    {
        DB::table('call_link_token')->insert([
            'user_id'=>Auth::user()->id,
            'interiewee_id'=>$request->interviewee,
            'event_id'=>$request->event_id,
            'event_link'=>$request->link
        ]);
        return response()->json([
            $request->all()]);
    }
    public function delete(Reqeuest $reqeuest,$id){
        dd($id);
    }
}
