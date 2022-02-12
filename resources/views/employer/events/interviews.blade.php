@extends('employer.layouts.app')

@section('content')
    @include('employer.layouts.headers.cards')

    <div class="container-fluid mt--7">
        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if(!$events->isEmpty())
        <div class="row mt-5 pb-4">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">All Events </h3>
                            </div>

                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>

                                    <th scope="col">Sr. No</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Start Time</th>
                                    <th scope="col">End TIme</th>
                                    <th scope="col"></th>
                                    <th scope="col">Applicant Name </th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($events as $event)
                                <form method="get" action="{{route('loadReactRoutePage')}}">
                                    {{-- @csrf --}}
                                    {{-- {{dd($event)}} --}}
                                    {{-- @method('') --}}
                                        <tr>
                                            <td scope="row">
                                                {{ $event->id}}
                                            </td>
                                            <td>
                                                {{$event->event_title}}
                                            </td>
                                            <td>
                                                {{$event->event_start_date}}
                                            </td>
                                            <td>
                                                {{$event->event_end_date}}
                                            </td>

                                            <td>
                                                <div id="applicant_data">

                                                </div>
                                            </td>
                                            <input type="hidden" name="interviewee" value="{{$event->event_applicant_id}}"/>
                                            <input type="hidden" name="event_name" value="{{$event->event_title}}"/>
                                            <input type="hidden" name="event_id" value="{{$event->event_id}}"/>
                                            <td>
                                                <button type="submit"  class="btn btn-primary">Start Call</button>
                                            </td>
                                        </tr>


                                </form>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        @else
        <div class="row mt-5 pb-4">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0 text-center">There are no events to show . Please Create a new evetn and come back </h3>
                            </div>

                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>

                                    <th scope="col">Sr. No</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Start Time</th>
                                    <th scope="col">End TIme</th>
                                    <th scope="col">Job Name</th>
                                    <th scope="col">Applicant Name </th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($events as $event)
                                {{dd($event)}}
                                <form method="post" action="{{route('fireEvent')}}">
                                    @csrf
                                    {{-- @method('put') --}}
                                        <tr>
                                            <td scope="row">
                                                {{ $event->id}}
                                            </td>
                                            <td>
                                                {{$event->title}}
                                            </td>
                                            <td>
                                                {{$event->start_date}}
                                            </td>
                                            <td>
                                                {{$event->end_date}}
                                            </td>

                                            <td>
                                                <div id="applicant_data">

                                                </div>
                                            </td>
                                            <td>
                                                <button type="submit" disabled="disabled" class="btn btn-primary">Invite Candidate</button>
                                            </td>
                                        </tr>

                                </form>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        @endif

        @include('employer.layouts.footers.auth')
    </div>
    @endsection
