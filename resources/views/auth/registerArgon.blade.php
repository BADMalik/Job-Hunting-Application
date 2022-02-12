@extends('layouts.app', ['class' => 'bg-default'])

@section('content')
    @include('layouts.headers.guest')

    <div class="container mt--8 pb-5">
        <!-- Table -->
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="card bg-secondary shadow border-0">
                    <div class=" text-center card-header bg-transparent pb-2">
                        <h2>PESHA</h2>
                    </div>
                    <div class="card-body px-lg-5 py-lg-2">

                        <form role="form" method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group{{ $errors->has('first_name') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative mb-1">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" placeholder="{{ __('Enter First Name') }}" type="text" id="first_name" name="first_name" value="{{ old('first_name') }}" required autofocus>
                                </div>
                                @if ($errors->has('first_name'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('last_name') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative mb-1">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" placeholder="{{ __('Please Enter Last Name') }}" type="text" id="last_name" name="last_name" value="{{ old('last_name') }}" required autofocus>
                                </div>
                                @if ($errors->has('last_name'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('username') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative mb-1">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" placeholder="{{ __('Enter Your User Name') }}" type="text" id="username" name="username" value="{{ old('username') }}" required autofocus>
                                </div>
                                @if ($errors->has('username'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative mb-1">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Enter Your Email') }}" type="email" id="email" name="email" value="{{ old('email') }}" required>
                                </div>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('address') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative mb-1">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" placeholder="{{ __('Enter Your Address') }}" type="text" id="address" name="address" value="{{ old('address') }}" required>
                                </div>
                                @if ($errors->has('address'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Enter Your Password') }}" type="password"  id="password"name="password" required>
                                </div>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="{{ __('Confirm Password') }}" type="password" id="password_confirmation" name="password_confirmation" required>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('phone_no') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-mobile-button"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('phone_no') ? ' is-invalid' : '' }}" placeholder="{{ __('Enter Your Phone') }}" type="tel" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" value="{{old('phone_no')}}" id="phone_no" name="phone_no" required>
                                    </div>
                                @if ($errors->has('phone_no'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('phone_no') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('country') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-world-2"></i></span>
                                    </div>
                                    <select class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" placeholder="{{ __('Select Your Country') }}" id="country" name="country" value="{{old('country')}}" required>
                                        @include('extras.country-input')
                                </div>
                                @if ($errors->has('country'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('qualification') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                    </div>
                                    <select class="form-control{{ $errors->has('qualification') ? ' is-invalid' : '' }}" placeholder="{{ __('Select Your Qualification') }}" id="qualification" name="qualification" required>
                                        @include('extras.qualifications')
                                    </select>
                                </div>
                                @if ($errors->has('qualification'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('qualification') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('gender') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                                    </div>
                                    <select class="form-control{{ $errors->has('gender') ? ' is-invalid' : '' }}" placeholder="{{ __('Select Your gender') }}" id="gender" value="{{old('gender')}}" name="gender" required>
                                        <option value="" selected="selected" disabled="disabled" hidden>Please Select A Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="FeMale">FeMale</option>
                                    </select>
                                </div>
                                @if ($errors->has('gender'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('role_name') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                                    </div>
                                    <select class="form-control{{ $errors->has('role_name') ? ' is-invalid' : '' }}" placeholder="{{ __('Select A Role') }}" id="role_name" value="{{old('role_name')}}" name="role_name" required>
                                        <option value="" selected="selected" disabled="disabled" hidden>Please Select A ROle</option>
                                        <option value="candidate">Candidate</option>
                                        <option value="employer">Employer</option>
                                    </select>
                                </div>
                                @if ($errors->has('role_name'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('skills') ? ' has-danger' : '' }}">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                                        </div>
                                        <select class="form-control{{ $errors->has('skills') ? ' is-invalid' : '' }}" placeholder="{{ __('Select Your Skills') }}" id="skills" name="skills[]" required multiple>
                                            <option value="" selected="selected" disabled="disabled" hidden>Please Select SKills</option>
                                            @include('extras.skills')
                                        </select>
                                    </div>

                                    @if ($errors->has('skills'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('skills') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            <div class="form-group{{ $errors->has('university') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('university') ? ' is-invalid' : '' }}" placeholder="{{ __('Enter Your University') }}" type="text"  id="university" name="university" required>
                                </div>
                                @if ($errors->has('university'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('university') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">{{ __('Create account') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script type="text/javascript">


        // $("#my-select").fastselect();


</script>
@endsection
