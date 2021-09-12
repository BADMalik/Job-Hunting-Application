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
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <h3 class="mb-0">{{ $company->name }}</h3>
                    </div>
                </div>
                <div class="card-body pb-4">

                        <div class="pl-lg-4">
                            <div  class="text-center" >
                                {{-- <a href="#">

                                    <img style="height:200px" src="{{ asset($company->profile_picture) }}" class="rounded-circle">
                                </a> --}}

                            <h6 class="heading-small pt-2 text-muted mb-4">{{ __('Company Details') }}</h6>
                            </div>
                            <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                            <h4 class="pl-4"><b>{{$company->name}}</b></h4><hr>
                            <label class="form-control-label" for="input-name">{{ __('Description') }}</label>
                            <h4 class="pl-4"><b>{{$company->description}}</b></h4><hr>
                            <label class="form-control-label" for="input-name">{{ __('Location') }}</label>
                            <h4 class="pl-4"><b>{{$company->location}}</b></h4><hr>
                            <label class="form-control-label" for="input-name">{{ __('Type') }}</label>
                            <h4 class="pl-4"><b>{{ucwords($company->type)}}</b></h4><hr>
                            <label class="form-control-label" for="input-name">{{ __('Total Employees') }}</label>
                            <h4 class="pl-4"><b>{{$company->employees_count}}</b></h4>


                        </div>

                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card-body pb-8">
                    <div class="card text-center bg-secondary shadow">
                        <div class="pl-lg-4">
                            <div class="card-header bg-white border-0">
                                <div class="row text-center">
                                    <h3 class="text-center mb-0">{{ $company->name }}</h3>
                                </div>
                            </div>
                            <div  class=" p-4 text-center" >
                                <a href="#">

                                    <img style="height:200px" src="{{ asset($company->profile_picture) }}" class="rounded-circle">
                                </a>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
@include('layouts.footers.nav')
@endsection
