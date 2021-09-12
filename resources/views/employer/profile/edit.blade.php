@extends('employer.layouts.app', ['title' => __('User Profile')])

@section('content')

    @include('employer.users.partials.header', [
        'title' => __('Hello') . ' '. auth()->user()->name,
        'description' => __('This is your profile page. You can edit your profile settings here.'),
        'class' => 'col-lg-7'
    ])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                <div class="card card-profile shadow">
                    <div class="row mb-8 justify-content-center">
                        <div class="col-lg-3 order-lg-2">
                            <div class="card-profile-image">

                                <a href="#">
                                    <img src="{{ asset(Auth::user()->profile_picture) }}" class="rounded-circle">

                                </a>
                            </div>
                        </div>

                    </div>

                    <div class="card-body  pt-md-2">
                            <div class="text-center pb-2">
                            <form id="ppForm" method="post" enctype="multipart/form-data">
@csrf
@method('put')
                                <a name="profile_picture_update" id="profile-picture-update" class="btn btn-primary text-white" type="button">Update Picture</a>
                                <input id='profile_picture_hidden' name="profile_picture_hidden" type='file' hidden/>
                            </form>
                            </div>
                            <div class="text-center">
                            <h3>
                                {{ auth()->user()->name }}<span class="font-weight-light">, 27</span>
                            </h3>
                            <div class="h5 font-weight-300">
                                <i class="ni location_pin mr-2"></i>{{Auth::user()->address}}, {{Auth::user()->country}}
                            </div>
                            <div class="h5 mt-4">
                                <i class="ni business_briefcase-24 mr-2"></i>{{ __(Auth::user()->designation) }}
                            </div>
                            <div>
                                <i class="ni education_hat mr-2"></i>{{ __('Studied At '.Auth::user()->university) }}
                            </div>
                            <hr class="my-4" />
                            <p>{{Auth::user()->description }}</p>

                        </div>

                    </div>
                </div>
            </div>
            <div class="col-xl-8 mt-10 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="mb-0">{{ __('Edit Profile') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('profile.update') }}" autocomplete="off">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4">{{ __('User information') }}</h6>

                            @if (session('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif


                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                    <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
                                    <input type="email" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email', auth()->user()->email) }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                        <div class="form-group{{ $errors->has('user_name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-user_name">{{ __('User Name') }}</label>
                                    <input type="text" name="user_name" id="input-user_name" class="form-control form-control-alternative{{ $errors->has('user_name') ? ' is-invalid' : '' }}" placeholder="{{ __('User Name') }}" value="{{ old('user_name', auth()->user()->user_name) }}" required>

                                    @if ($errors->has('user_name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('user_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('address') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-address">{{ __('Address') }}</label>
                                    <input type="text" name="address" id="input-address" class="form-control form-control-alternative{{ $errors->has('address') ? ' is-invalid' : '' }}" placeholder="{{ __('address') }}" value="{{ old('address', auth()->user()->address) }}" required>

                                    @if ($errors->has('address'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('university') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-university">{{ __('University') }}</label>
                                    <input type="text" name="university" id="input-university" class="form-control form-control-alternative{{ $errors->has('university') ? ' is-invalid' : '' }}" placeholder="{{ __('University') }}" value="{{ old('university', auth()->user()->university) }}" required>

                                    @if ($errors->has('university'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('university') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-description">{{ __('Description') }}</label>
                                    <input type="text" name="description" id="input-description" class="form-control form-control-alternative{{ $errors->has('description') ? ' is-invalid' : '' }}" placeholder="{{ __('Description') }}" value="{{ old('description', auth()->user()->description) }}" required>

                                    @if ($errors->has('description'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            <div class="form-group{{ $errors->has('qualification') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-qualification">{{ __('Qualification') }}</label>
                                    <input type="text" name="qualification" id="input-qualification" class="form-control form-control-alternative{{ $errors->has('qualification') ? ' is-invalid' : '' }}" placeholder="{{ __('qualification') }}" value="{{ old('qualification', auth()->user()->qualification) }}" required>

                                    @if ($errors->has('qualification'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('qualification') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('phone_no') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-phone_no">{{ __('Contact No') }}</label>
                                    <input name="phone_no" id="input-phone_no" class="form-control form-control-alternative{{ $errors->has('phone_no') ? ' is-invalid' : '' }}" type="tel" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" placeholder="{{ __('Phone No') }}" value="{{ old('phone_no', auth()->user()->phone_no) }}" required>

                                    @if ($errors->has('phone_no'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('phone_no') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('required_skills') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-required_skills">{{ __('Skills') }}</label>
                                    <select id="required_skills" multiple  name="required_skills[]" class="form-control form-control-alternative" required  >
                                        @foreach($skillArray as $skill)
                                            <option class="form-control form-control-alternative" selected value="{{(int)($skill['id'])}}">{{$skill['name']}}</option>
                                        @endforeach

                                    @include('extras.skills')

                                    </select>
                                    @if ($errors->has('required_skills'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('required_skills') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                </div>
                            </div>
                        </form>
                        <hr class="my-4" />
                        <form method="post" action="{{ route('profile.password') }}" autocomplete="off">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4">{{ __('Password') }}</h6>

                            @if (session('password_status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('password_status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-current-password">{{ __('Current Password') }}</label>
                                    <input type="password" name="old_password" id="input-current-password" class="form-control form-control-alternative{{ $errors->has('old_password') ? ' is-invalid' : '' }}" placeholder="{{ __('Current Password') }}" value="" required>

                                    @if ($errors->has('old_password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('old_password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-password">{{ __('New Password') }}</label>
                                    <input type="password" name="password" id="input-password" class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('New Password') }}" value="" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="input-password-confirmation">{{ __('Confirm New Password') }}</label>
                                    <input type="password" name="password_confirmation" id="input-password-confirmation" class="form-control form-control-alternative" placeholder="{{ __('Confirm New Password') }}" value="" required>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Change password') }}</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
<script type="text/javascript">
    // alert('adw');
    $('#required_skills').select2();
    $('#profile-picture-update').on('click',()=>
    {
            document.getElementById('profile_picture_hidden').click();
    });
    $('#profile_picture_hidden').on('change',()=>
    {
                var formId = $("#ppForm")[0];
                // var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                var formData = new FormData(formId);
                    // formData.append('data',formId);
                console.log(formData.values);return 0;
                $.ajax({
                    /* the route pointing to the post function */
                    url: '/updateProfilePicture',
                    type: 'POST',
                    /* send the csrf-token and the input to the controller */
                    data: {_token: CSRF_TOKEN, message:$(".getinfo").val()},
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */
                    success: function (data) {
                        $(".writeinfo").append(data.msg);
                    }
                });

        // alert('se');
    });
</script>
@endsection
