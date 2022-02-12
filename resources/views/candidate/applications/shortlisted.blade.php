@extends('candidate.layouts.app')

@section('content')
    @include('candidate.layouts.headers.cards')

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

                                    <th scope="col">Call Status </th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($events as $event)
                                <form method="post" action="{{route('loadReactRoutePage')}}">
                                    @csrf
                                    {{-- {{dd($link)}} --}}
                                    @method('post')
                                        <tr>
                                            <td scope="row">
                                                {{ $event->id}}
                                            </td>
                                            <td>
                                                {{$event->text}}
                                            </td>
                                            <td>
                                                {{$event->start_date}}
                                            </td>
                                            <td>
                                                {{$event->end_date}}
                                            </td>
                                            @if($link->isEmpty())
                                            <td>
                                                <div>
                                                    The call hasn't been started yet
                                                </div>
                                            </td>
                                            @else
                                            <td>
                                                <div>
                                                    {{-- {{dd($link)}} --}}
                                                    <a href="{{$link[0]->event_link}}">Go to Call
                                                </div>
                                            </td>
                                            @endif
                                            <input type="hidden" name="interviewee" value="{{$event->applicant_id}}"/>
                                            <input type="hidden" name="event_name" value="{{$event->text}}"/>
                                            <input type="hidden" name="event_id" value="{{$event->id}}"/>
                                            {{-- <td>
                                                <button type="submit"  class="btn btn-primary">Start Call</button>
                                            </td> --}}
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
                                    @method('put')
                                        <tr>
                                            <td scope="row">
                                                {{ $event->id}}
                                            </td>
                                            <td>
                                                {{$event->text}}
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

        @include('candidate.layouts.footers.auth')
    </div>
    @endsection
