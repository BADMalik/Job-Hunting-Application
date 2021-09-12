@extends('employer.layouts.app')
@section('content')
@include('employer.users.partials.header', [
    'title' => __('Job : '. $job->title),
    'description' => __('View job Details'),
    'class' => 'col-lg-12'
])
{{-- @include('employer.job.cv-modal') --}}
<div class="container-fluid mt--9 ">
    <div class="row align-items-center">

        <div class="col-xl-6     text-center mb-7 ">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white">

                        <h3 class="mb-0">{{ $job->title }}</h3>

                </div>
                <div class="card-body pb-4">

                        <div class="pl-lg-4">
                            <div  class="text-center" >

                            <h6 class=" pt-2 display-3 mb-4">{{ __('job Details') }}</h6>
                            </div><hr>
                            <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                            <h4 class="pl-4"><b>{{$job->title}}</b></h4><hr>
                            <label class="form-control-label" for="input-name">{{ __('Description') }}</label>
                            <h4 class="pl-4"><b>{{$job->description}}</b></h4><hr>
                            <label class="form-control-label" for="input-name">{{ __('Location') }}</label>
                            <h4 class="pl-4"><b>{{$job->location}}</b></h4><hr>
                            <label class="form-control-label" for="input-name">{{ __('Position') }}</label>
                            <h4 class="pl-4"><b>{{ucwords($job->position)}}</b></h4><hr>
                            <label class="form-control-label" for="input-name">{{ __('Experience Required') }}</label>
                            <h4 class="pl-4"><b>{{$job->Experience}} Years</b></h4><hr>
                            <label class="form-control-label" for="input-name">{{ __('Skills Required') }}</label>
                            <h4 class="pl-4"><b>{{$job->required_skills}}</b></h4><hr>
                            <label class="form-control-label" for="input-name">{{ __('Poster By') }}</label>
                            <h4 class="pl-4"><b>{{$jobPoster->name}}</b></h4>


                        </div>

                </div>
            </div>
        </div>

    </div>
@include('layouts.footers.nav')
@endsection
