@extends('employer.layouts.app')

@section('content')
    @include('employer.users.partials.header', [
     'title' => __('Hello') . ' '. auth()->user()->name,
     'description' => __('Create A new Job for Recruiters.'),
     'class' => 'col-lg-7'
 ])
    <div class="container-fluid mt--7">
        <div class="row">

            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="mb-0">{{ __('Create Job') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('employer.createjob') }}" autocomplete="off">
                            @csrf
                            @method('post')
                            <h6 class="heading-small text-muted mb-4">{{ __('Job  information') }}</h6>

                            @if (session('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Title') }}</label>
                                    <input type="text" name="title" id="title" class="form-control form-control-alternative{{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="{{ __('Title') }}" value="{{ old('title') }}" required autofocus>

                                    @if ($errors->has('title'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Description') }}</label>
                                    <input type="text" name="description" id="description" class="form-control form-control-alternative{{ $errors->has('description') ? ' is-invalid' : '' }}" placeholder="{{ __('Description') }}" value="{{ old('description') }}" required autofocus>

                                    @if ($errors->has('description'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('position') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Position') }}</label>
                                    <input type="text" name="position" id="position" class="form-control form-control-alternative{{ $errors->has('position') ? ' is-invalid' : '' }}" placeholder="{{ __('Position') }}" value="{{ old('position') }}" required autofocus>

                                    @if ($errors->has('position'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('position') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                {{-- <div class="form-group{{ $errors->has('experience') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Experience') }}</label>
                                    <input type="text" name="experience" id="experience" class="form-control form-control-alternative{{ $errors->has('experience') ? ' is-invalid' : '' }}" placeholder="{{ __('Experience') }}" value="{{ old('experience') }}" required autofocus>

                                    @if ($errors->has('experience'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('experience') }}</strong>
                                        </span>
                                    @endif
                                </div> --}}
                                <div class="form-group{{ $errors->has('required_skills') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Required Skills') }}</label>

                                    <select id="required_skills" multiple name="required_skills[]" class="form-control  form-control-alternative" value="{{ old('required_skills') }}" required  >
                                        {{-- <option value="" disabled selected hidden>Please Select Your Skills</option> --}}
                                        @include('extras.skills')

                                    </select>
                                    @if ($errors->has('required_skills'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('required_skills') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('experience') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Experience') }}</label>
                                    <input type="text" name="experience" id="experience" class="form-control form-control-alternative{{ $errors->has('experience') ? ' is-invalid' : '' }}" placeholder="{{ __('Experience') }}" value="{{ old('experience') }}" required autofocus>

                                    @if ($errors->has('experience'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('experience') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('designation_category') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Designation') }}</label>
                                    <input type="text" name="designation_category" id="designation_category" class="form-control form-control-alternative{{ $errors->has('designation_category') ? ' is-invalid' : '' }}" placeholder="{{ __('Enter Designation Category') }}" value="{{ old('designation_category') }}" required autofocus>

                                    @if ($errors->has('designation_category'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('designation_category') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('location') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('location') }}</label>
                                    <input type="text" name="location" id="location" class="form-control form-control-alternative{{ $errors->has('location') ? ' is-invalid' : '' }}" placeholder="{{ __('Enter Location') }}" value="{{ old('location') }}" required autofocus>

                                    @if ($errors->has('location'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('location') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('shift') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Shift') }}</label>
                                    <select class="form-control form-control-alternative" required>
                                        <option value="" disabled hidden selected>{{ __('Please Select A Shift') }}</option>
                                        <option value="morning">Morning</option>
                                        <option value="evening">Evening</option>
                                    </select>
                                    @if ($errors->has('shift'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('shift') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('company') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Company') }}</label>
                                    <select required="required" name="company_id" id="company_id"class="form-control form-control-alternative" required>
                                        <option value="" disabled hidden selected>{{ __('Please Select A company') }}</option>
                                        @foreach($companies as $company)
                                        <option value="{{$company->id}}" class="form-control form-control-alternative">{{$company->name}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('company'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('company') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <input type="hidden" name="employer_id" value="{{Auth::user()->id}}">
                                <button type="submit" class="btn center btn-success"> Submit</button>
                                {{-- <input type="submit"  --}}
                                {{-- <input type="hidden" name="company_id" value="{{Auth::user()->id}}"> --}}
                            </div>
                        </form>
                        <hr class="my-4" />
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
<script type="text/javascript">
    // alert('adw');
    $('#required_skills').select2(
    {

    }
    );

</script>
@endsection
