@extends('candidate.layouts.app')
@section('content')
@include('candidate.users.partials.header', [
    'title' => __('Job : '. $job->title),
    'description' => __('View Job Details'),
    'class' => 'col-lg-12'
])
@include('candidate.job.cv-modal',['id'=>$job->id])
<div class="container-fluid mt--9 ">
    <div class="row">

        <div class="col-xl-8 mb-7 ">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <h3 class="mb-0">{{ $job->title }}</h3>
                    </div>
                </div>
                <div class="card-body pb-4">

                        <div class="pl-lg-4">
                            <div  class="text-center" >
                            <h6 class="heading-small pt-2 text-muted mb-4">{{ __('Job Details') }}</h6>
                            </div>
                            <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                            <h4  class="pl-4"><b>{{$job->title}}</b></h4><hr>
                            <label class="form-control-label" for="input-name">{{ __('Description') }}</label>
                            <h4 class="pl-4"><b>{{$job->description}}</b></h4><hr>
                            <label class="form-control-label" for="input-name">{{ __('Location') }}</label>
                            <h4 class="pl-4"><b>{{$job->location}}</b></h4><hr>
                            <label class="form-control-label" for="input-name">{{ __('Position') }}</label>
                            <h4 class="pl-4"><b>{{ucwords($job->position)}}</b></h4><hr>
                            <label class="form-control-label" for="input-name">{{ __('Experience Required') }}</label>
                            <h4 class="pl-4"><b>{{$job->Experience}} Years</b></h4>
                            <label class="form-control-label" for="input-name">{{ __('Skills Required') }}</label>
                            <h4 class="pl-4"><b>{{$job->required_skills}}</b></h4>
                        </div>
                        <div class="text-center">

                            <button id="cv-modal" type="button" class="btn btn-success" href="#">Upload CV</button>
                        </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="">
                    <div class=" text-center bg-secondary shadow">
                            <div class="card-header bg-white">
                                <div class=" text-center">
                                    <h3 class="text-center mb-0">{{ $job->title }}</h3>
                                </div>
                            </div>
                            <div  class=" p-4 text-center" >
                                <a href="#">

                                    <img style="height:200px" src="{{ asset('images/job/dummy.jpg') }}" class="rounded-circle">
                                </a>
                            </div>
                        {{-- </div> --}}
                    </div>

            </div>
        </div>
    </div>

@include('layouts.footers.nav')
    <script type="text/javascript">
        $('#cv-modal').on('click', function () {
            $("#cv-modal-dialog").modal('show');

        })
        </script>

@endsection
