<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;
use Illuminate\Support\Facades\Auth;
class ApplicationController extends Controller
{
        public function index(Request $request)
        {
            $pendingApplications = (Application::getApplicationsExceptShortlisted(Auth::user()->id));
            return view('candidate.applications.applications',compact('pendingApplications'));
        }

}
