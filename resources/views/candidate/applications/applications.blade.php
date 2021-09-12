@extends('candidate.layouts.app')
@section('content')

@include('candidate.users.partials.header', [
     'title' => __('Hello') . ' '. auth()->user()->name,
     'description' => __('Following are statuses of your submitted applications.'),
     'class' => 'col-lg-12'
 ]);
    <div class="container-fluid mt--7">
        <div class="row pb-7 mt-2">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Job Status</h3>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>

                                    <th scope="col">Sr. No</th>
                                    <th scope="col">Position</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Description</th>
                                    {{-- <th scope="col">Experience</th>
                                    <th scope="col">Skills</th> --}}
                                    <th scope="col">Status</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1;?>
                                @foreach ($pendingApplications as $job)
                                <tr>
                                    <td scope="row">
                                        {{$i}}
                                        <?php $i++;?>
                                    </td>
                                    <td>
                                        {{$job->designation_category}}
                                    </td>
                                    <td>
                                        {{$job->title}}
                                    </td>
                                    <td>
                                        {{Str::limit($job->description,20)}}
                                    </td>
                                    {{-- <td>
                                        {{($job->Experience)}} years
                                    </td> --}}
                                    {{-- <td>
                                        {{($job->required_skills)}}
                                    </td> --}}

                                    <td>
                                        <b>{{$job->status}}</b>
                                        {{-- <a href={{route('candidate.company.job.view',['id'=>$job->id])}}>View Job</a><span class="ml-4 text-white"
                                        style="color:white;background-color:#47d239;padding:8px 12px;border-radius:5%"> <a style="color:white" href={{route('candidate.company.job.edit',['id'=>$job->id])}}>Edit Job</a></span>
                                        <span class="ml-4 text-white"
                                        style="color:white;background-color:#f73121;padding:8px 12px;border-radius:5%"> <a style="color:white" href={{route('candidate.company.job.view',['id'=>$job->id])}}>Delete Job</a></span> --}}
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
<script type="text/javascript">
$("tr td:last-child").each(function() {
    let content = $(this).html();
    let appendable = $(this);
       if(content.includes('shortlisted'))
        {
            console.log(content);
            appendable.append('<span style="padding-left:5px">(congrats!! you will be soon called for an interview)</span>')
            $(this).parent('tr').css('color','green');
        }
        if(content.includes('rejected'))
        {
            console.log(content);
            $(this).parent('tr').css('background-color','red');
            $(this).parent('tr').css('color','white');
        }
    // compare id to what you want
});
</script>
@endsection
