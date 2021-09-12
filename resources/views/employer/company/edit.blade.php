@extends('employer.layouts.app')
@section('content')
@include('employer.users.partials.header', [
    'title' => __('Company : '. $company->name),
    'description' => __('View Company Details'),
    'class' => 'col-lg-12'
])
{{-- @include('employer.job.cv-modal') --}}
<div class="container-fluid mt--9 ">
    <div class="row">

        <div class="col-xl-8 mb-7 ">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white ">
                    <div class="row align-items-center">
                        <h3 class="mb-0">{{ $company->name }}</h3>
                    </div>
                </div>
                <div class="card-body pb-4">
                <form method="post" action="{{ route('employer.company.update') }}" autocomplete="off">
                            @csrf
                            @method('put')
                        <div class="pl-lg-4">
                            <div  class="text-center" >
                            @if (session('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <h6 class="heading-small pt-2 text-muted mb-4">{{ __('Company Details') }}</h6>
                            </div>
                            <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                            <input type="text" id="name" name="name" class="pl-4 form-control form-control-alternative" value="{{old('name',$company->name)}}">
                            <label class="form-control-label pt-2" for="input-name">{{ __('Description') }}</label>
                            <textarea class="pl-4 form-control form-control-alternative" id="description" name="description" value="{{old('description')}}">{{$company->description}}</textarea>
                            <label class="pt-2 form-control-label" for="input-name">{{ __('Location') }}</label>
                            <input class="form-control form-control-alternative" id="location" name="location" value="{{old('location',$company->location)}}">


                            <label class="form-control-label" for="input-name">{{ __('Type') }}</label>
                            <input name="type" id="type" class="pl-4 form-control form-control-alternative" value="{{old('type',$company->type)}}">
                            <label class="form-control-label" for="input-name">{{ __('Total Employees') }}</label>
                            <input class="pl-4 form-control form-control-alternative" id="employees_count" name="employees_count" value="{{old('employees_count',$company->employees_count)}}">
                            <div class="text-center pt-4">
                            <button   id="submit" class="btn btn-success text-center" type="submit" >Update</button></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
                    <div class="card text-center bg-secondary shadow">

                            <div class="card-header bg-white ">
                                    <h3>{{ $company->name }}</h3>

                            </div>
                            <div  class=" p-4 text-center" >
                                <a href="#">

                                    <img style="height:200px" src="{{ asset($company->profile_picture) }}" class="rounded-circle">
                                </a>


                        </div>Company Profile Picture
                            <div class="text-center p-4">
                            <button name="submit"  id="submit" class="btn btn-success text-center" type="submit" >Update</button></div>
                        </div>


        </div>
    </div>
@include('layouts.footers.nav')
@endsection
