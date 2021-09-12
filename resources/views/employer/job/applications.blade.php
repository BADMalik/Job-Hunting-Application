@extends('employer.layouts.app')

@section('content')
    @include('employer.users.partials.header', [
     'title' => __('Hello') . ' '. auth()->user()->name,
     'description' => __('View Applications For Your Job '),
     'class' => 'col-lg-12'
 ])
    <div class="container-fluid mt--7">
        <div class="row pb-7 mt-2">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">{{$job->title}}</h3>
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
                                    <th scope="col">Description</th>
                                    <th scope="col">Designation</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">CV </th>
                                    {{-- <th scope="col">Applications </th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1;?>
                                @foreach ($applications as $application)
                                <tr>
                                    <td scope="row">
                                        {{$i}}
                                        <?php $i++;?>
                                    </td>
                                    <td>
                                        {{$application->title}}
                                    </td>
                                    <td>
                                        {{Str::limit($application->description,20)}}
                                    </td>
                                    <td>
                                        {{$application->designation_category}}
                                    </td>
                                    <td>
                                        {{$application->status}}
                                    </td>
                                    <td>
                                        <a href={{route('employer.job.application',['id'=>$application->id])}}>View Application</a>
                                    </td>
                                    {{-- <td>
                                        <a href="{{route('employer.job.applications',['id'=>$activeJob->id])}}">View Applications</a>
                                    </td> --}}
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
