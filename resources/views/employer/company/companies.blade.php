@extends('employer.layouts.app')

@section('content')
    @include('employer.users.partials.header', [
     'title' => __('Hello') . ' '. auth()->user()->name,
     'description' => __('View The Companies You Represent.'),
     'class' => 'col-lg-12'
 ])
    <div class="container-fluid mt--7">
        <div class="row pb-7 mt-2">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0"></h3>
                            </div>

                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>

                                    <th scope="col">Sr. No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Location</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Total Employees </th>
                                    <th scope="col">View Company </th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1;?>
                                @foreach ($companies as $application)
                                <tr>
                                    <td scope="row">
                                        {{$i}}
                                        <?php $i++;?>
                                    </td>
                                    <td>
                                        {{$application->name}}
                                    </td>
                                    <td>
                                        {{Str::limit($application->description,20)}}
                                    </td>
                                    <td>
                                        {{ucwords($application->location)}}
                                    </td>
                                    <td>
                                        {{ucwords($application->type)}}
                                    </td>
                                    <td>
                                        {{$application->employees_count}}
                                    </td>
                                    <td>
                                        <a href={{route('employer.company.view',['id'=>$application->id])}}>View Company</a><span class="ml-4 text-white"
                                        style="color:white;background-color:grey;padding:8px 12px;border-radius:5%"> <a style="color:white" href={{route('employer.company.jobs',['id'=>$application->id])}}>View Company Active Jobs</a></span><span class="ml-4 text-white"
                                        style="color:white;background-color:#47d239;padding:8px 12px;border-radius:5%"> <a style="color:white" href={{route('employer.company.edit',['id'=>$application->id])}}>Edit Company</a></span>
                                        <span class="ml-4 text-white"
                                        style="color:white;background-color:#f73121;padding:8px 12px;border-radius:5%"> <a style="color:white" href={{route('employer.company.delete',['id'=>$application->id])}}>Delete Company</a></span>
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
