@extends('candidate.layouts.app', ['class' => 'bg-default'])

@section('content')
    <div class="header bg-gradient-primary py-2 py-lg-2">
        <div class="container">
            <div class="header-body text-center mt-7 mb-1">
                <div class="row justify-content-center">
                    <div class="col-lg-12 col-md-12 pb-2">
                        <h1 class="text-white">{{ __('Welcome ').Auth::user()->name }}</h1>
                    </div>
                     <div class="col-lg-12 col-md-12 pb-2">
                        <h1 class="text-white">{{ __('Welcome to PESHA.')}}</h1>
                    </div>
                </div>

                <img class="rounded-circle" height="200" src='{{asset('images/dummy.jpg')}}'>
        </div>

        </div>

    </div>

    <div class="container mt--5 pb-5"><div class="header-body text-center mt-7 mb-9">
        <div class="row  justify-content-center">
            <div class="col-lg-12 col-md-12 pb-6">
                <h4 class="text-white display-2  ">If You are looking for best career opportunities then your at the right place!!</h4>
            </div>
        </div>

  </div>
    @include('employer.layouts.footers.nav')
</div>


@endsection
