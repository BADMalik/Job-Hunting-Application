<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Application extends Model
{
    public $fillable = [
        'status',
        'applicant_cv',
        'description',
        'applicant_id',
        'title',
        'designation_category',
        'job_id',
        'create_at',
        'updated_at'
    ];
    use HasFactory;
    public static function getAllApplications($id)
    {
        // dd($id);
//where('status','<>','shortlisted')->
        $submittedApplications = Application::where('applicant_id','=',$id)->where('status','submitted')->get();
        $shortlistedApplications = Application::where('applicant_id','=',$id)->where('status','shortlisted')->get();
        $reviewedApplications = Application::where('applicant_id','=',$id)->where('status','reviewed')->get();
        $rejectedApplications = Application::where('applicant_id','=',$id)->where('status','rejected')->get();

        return [
            'submitted' => $submittedApplications,
            'shortlisted' => $shortlistedApplications,
            'reviewed' => $reviewedApplications,
            'rejected' => $rejectedApplications
        ];
        // return $allApplications->map(function($value, $key)  {
        //     if($value->status == "submitted") {
        //         if(isset($response['submitted'])) {
        //             array_push($response['submitted'],$value);
        //         } else {
        //             $response['submitted'] = $value;
        //         }
        //     } else if ($value->status == 'shortlisted') {
        //         if(isset($response['shortlisted'])) {
        //             array_push($response['shortlisted'],$value);
        //         } else {
        //             $response['shortlisted'] = $value;
        //         }
        //     } else if ($value->status == 'rejected') {
        //         if(isset($response['rejected'])) {
        //             array_push($response['rejected'],$value);
        //         } else {
        //             $response['rejected'] = $value;
        //         }
        //     }else if ($value->status == 'reviewed') {
        //         if(isset($response['reviewed'])) {
        //             array_push($response['reviewed'],$value);
        //         } else {
        //             $response['reviewed'] = $value;
        //         }
        //     }
        //     return $response;

        // });

    }
}
