@extends('employer.layouts.app')
@section('content')
@include('employer.users.partials.header', [
    'title' => __('Application of '. $applicant->name),
    'description' => __('View Application For Your Job'),
    'class' => 'col-lg-12'
])
@include('employer.job.cv-modal')
<div class="container-fluid mt--9">
    <div class="row">

        <div class="col-xl-6 center">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <h3 class="mb-0">{{ $applicant->name }}</h3>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('application.status.update',array('id'=>$application->id))}}">
                        @csrf
                        @method('put')
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <p><strong>Opps Something went wrong</strong></p>
                                <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <div class="pl-lg-4">
                            <div  class="text-center" >
                                <a href="#">

                                    <img style="height:200px" src="{{ asset('images/job/dummy.jpg') }}" class="rounded-circle">
                                </a>

                            <h6 class="heading-small pt-2 text-muted mb-4">{{ __('Application Information') }}</h6>
                            </div>
                            <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                            <h4 class="pl-4"><b>{{$applicant->name}}</b></h4><hr>
                            <label class="form-control-label" for="input-name">{{ __('Email') }}</label>
                            <h4 class="pl-4"><b>{{$applicant->email}}</b></h4><hr>
                            <label class="form-control-label" for="input-name">{{ __('Phone No.') }}</label>
                            <h4 class="pl-4"><b>{{$applicant->phone_no}}</b></h4><hr>
                            <label class="form-control-label" for="input-name">{{ __('User Name') }}</label>
                            <h4 class="pl-4"><b>{{$applicant->user_name}}</b></h4><hr>
                            <label class="form-control-label" for="input-name">{{ __('Qualification') }}</label>
                            <h4 class="pl-4"><b>{{$applicant->qualification}}</b></h4><hr>
                            <label class="form-control-label" for="input-name">{{ __('Skills') }}</label>
                            <h4 class="pl-4"><b>{{$skills}}</b></h4><hr>
                            <label class="form-control-label" for="input-name">{{ __('Country') }}</label>
                            <h4 class="pl-4"><b>{{$applicant->country}}</b></h4><hr>
                            <label class="form-control-label" for="input-name">{{ __('Current Employment Status') }}</label>
                            <h4 class="pl-4"><b>{{ucwords($applicant->employment_status)}}</b></h4><hr>
                            <div class="text-center pb-4">
                                @if($applicant->cv!=='')

                                    <button type="button" class="btn btn-primary" id="cv-modal">
                                        View CV
                                    </button>
                                @endif
                            </div>
                            <select class="form-control" name="status">
                                <option hidden selected value="{{$application->status}}">{{ucwords($application->status)}}</option>
                                <option value="shortlisted">ShortList Candidate</option>
                                <option value="rejected"> Reject Candidate</option>
                                <option value="reviewed">Add Application to Reviewed List</option>
                            </select>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success mt-4">{{ __('Update Application Status') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $('#cv-modal').on('click', function () {
            $("#cv-modal-dialog").modal('show');

        })
        </script>
@endsection
