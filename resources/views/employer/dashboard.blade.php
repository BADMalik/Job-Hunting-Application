@extends('employer.layouts.app')

@section('content')
    @include('employer.layouts.headers.cards')

    <div class="container-fluid mt--7">

        <div class="row mt-5 pb-4">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">All Jobs </h3>
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
                                    <th scope="col">Position</th>
                                    <th scope="col">Shift</th>
                                    <th scope="col">Location</th>
                                    <th scope="col">Company </th>
                                    <th scope="col">Applications </th>
                                    <th span="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($activeJobs as $activeJob)
                                <tr>
                                    <td scope="row">
                                        {{ $activeJob->id}}
                                    </td>
                                    <td>
                                        {{$activeJob->title}}
                                    </td>
                                    <td>
                                        {{$activeJob->position}}
                                    </td>
                                    <td>
                                        {{$activeJob->shift}}
                                    </td>
                                    <td>
                                        {{$activeJob->location}}
                                    </td>
                                    <td>
                                        {{$activeJob->company}}
                                    </td>
                                    <td>
                                        <a href="{{route('employer.job.applications',['id'=>$activeJob->id])}}">View Applications</a>
                                    </td>
                                    <td>
                                        <a style="color:white;background-color:red;padding:7px 5px;border-radius:10%" href="{{route('employer.deletejob',['id'=>$activeJob->id])}}">Delete Job</a>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

        @include('employer.layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
