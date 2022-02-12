<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Job extends Model
{
    protected $fillable = ['title', 'description','position','experience','required_skills','designation_category','location','company_id','employer_id'];
    use HasFactory;

    public function candidates()
    {
        return $this->belongsToMany('App\User');
    }

    public function employer()
    {
        return $this->belongsTo('App\User', 'employer_id');
    }

    public static function getCompanyJobs($id)
    {

            $jobs = DB::table('jobs')->where('company_id',$id)->get();
            // $jobs = explode(',',$jobs->required_skills);
            foreach($jobs as $job)
            {
                $skillsKey = '';
                $skills = str_replace(']','',str_replace('[','',$job->required_skills));
                $skills = explode(',',$skills);
                foreach($skills as $skill)
                {
                $skill = str_replace("\"",'',$skill);
                    // $id=(int)$skill;
                    $value = DB::table('skills')->where('id',(int)$skill)->get()[0];
                    // dd($value);
                    $skillsKey .= $value->name.",";
                }
                $skillsKey = rtrim($skillsKey,",");
                // dd($job);
                $job->required_skills = $skillsKey;
            }
            return $jobs;
    }
    public static function getJob($id)
    {

            $job = DB::table('jobs')->where('id',$id)->get()[0];
            // dd($job);
            $jobs = explode(',',$job->required_skills);

                $skillsKey = '';
                $skills = str_replace(']','',str_replace('[','',$job->required_skills));
                $skills = explode(',',$skills);
                foreach($skills as $skill)
                {
                    // dd($skill);
                $skill = str_replace("\"",'',$skill);
                    // $id=(int)$skill;
                    // dd($skill);
                    $value = DB::table('skills')->where('id',(int)$skill)->get()[0];
                        $skillsKey .= $value->name.",";
                }
                $skillsKey = rtrim($skillsKey,",");
                // dd($job);
                $job->required_skills = $skillsKey;
            return $job;
            // dd($job);
    }
    public  static function getPoster($id)
    {
        $posterId =DB::table('jobs')->where('id',$id)->get()[0];
        // dd($posterId);
        $employer = DB::table('users')->where('id',$posterId->employer_id)->get()[0];
        // dd($employer);
        return $employer;
    }
    public static function allJobs()
    {
        $skills  =explode(',',(Auth::user()->skills));

        $allJobs =  DB::table('jobs')->get()->all();
        // dd($allJobs);
        // $companies = $allJobs->filter(function($item) {
        //     return $item->
        // });
        $jobIds = [];
        foreach ($allJobs as $job)
        {
            array_push($jobIds, $job->id);
            // dd($allJobs);
            $company = Company::get('*')->where('id', $job->company_id)->first();
            // dd($company);
            if(($company)) {
                $job->company = $company['name'];
            }
        }
        // dd($allJobs);
        return $allJobs;
    }

}
