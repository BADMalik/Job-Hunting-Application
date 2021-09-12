<?php

namespace App\Http\Controllers\Employer;
use App\Models\Company;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CompanyController extends Controller
{
    // $company = new Company();
    //
    public function index(Request $request)
    {
        $company= new Company();
        $companies = $company->getCompanies();
        return view('employer.company.companies',compact('companies'));
        // dd(return new Company());
    }
     public function show(Request $request,$id)
    {

        $company= new Company();
        $company = $company->getCompany($id);
        return view('employer.company.company',compact('company'));
    }
    public function edit(Request $request,$id)
    {
                $company= new Company();
                $company = $company->getCompany($id);
                return view('employer.company.edit',compact('company'));

    }
    public function create(Request $request)
    {
        return view('employer.company.create');
    }
    public function update(Request $request)
    {
        return back()->withStatus(__('Profile successfully updated.'));
        // dd($request->all());
    }
    public function store(Request $request)
    {
        // dd($request->except('_token','_method'));
        // $status= Company::create($request->except('_token','_method'));
        return redirect()->route('employer.companies')->withStatus(__('Company Created Successfully.'));

    }
}
