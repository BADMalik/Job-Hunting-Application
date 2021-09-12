@extends('employer.layouts.app')

@section('content')
    @include('employer.users.partials.header', [
     'title' => __('Hello') . ' '. auth()->user()->name,
     'description' => __('Create A New Company.'),
     'class' => 'col-lg-7'
 ])
    <div class="container-fluid mt--7">
        <div class="row">

            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="mb-0">{{ __('Create Company') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('employer.create.company') }}" autocomplete="off">
                            @csrf
                            @method('post')
                            <h6 class="heading-small text-muted mb-4">{{ __('Company  information') }}</h6>
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
                                    <input type="text" name="name" id="name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
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
                                <div class="form-group{{ $errors->has('type') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('type') }}</label>
                                    <input type="text" name="type" id="type" class="form-control form-control-alternative{{ $errors->has('type') ? ' is-invalid' : '' }}" placeholder="{{ __('type') }}" value="{{ old('type') }}" required autofocus>

                                    @if ($errors->has('type'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('type') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('employees_count') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Total Company Employees') }}</label>
                                    <input type="text" name="employees_count" id="employees_count" class="form-control form-control-alternative{{ $errors->has('employees_count') ? ' is-invalid' : '' }}" placeholder="{{ __('Enter employees_count') }}" value="{{ old('employees_count') }}" required autofocus>

                                    @if ($errors->has('employees_count'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('employees_count') }}</strong>
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
                                <input type="hidden" name="owner_id" value="{{Auth::user()->id}}">
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
