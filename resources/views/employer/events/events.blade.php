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
                                    <th scope="col">Job Name</th>
                                    <th scope="col">Applicant Name </th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($events as $event)
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
                                                <select required="required" onchange="getval(this);" id="job_select" name="job_select" class="form-control">
                                                    <option  selected="selected" disabled="disabled" hidden>
                                                        Please Select A job You Represent
                                                    </option>
                                                    @foreach ($jobs as $job)
                                                        <option value={{$job->id}}>{{$job->title}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <div id="applicant_data">

                                                </div>
                                            </td>
                                            <td>
                                                <button type="submit" disabled="disabled" class="btn btn-primary">Invite Candidate</button>
                                            </td>
                                        </tr>
                                        <input type="hidden" id="select_applicant_hidden" name="select_applicant_hidden">
                                        <input type="hidden" id="user_id" name="user_id" value="{{Auth::user()->id}}">
                                        <input type="hidden" id="event_id" name="event_id" value="{{$event->id}}">
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
                                                <select required="required" onchange="getval(this);" id="job_select" name="job_select" class="form-control">
                                                    <option  selected="selected" disabled="disabled" hidden>
                                                        Please Select A job You Represent
                                                    </option>
                                                    @foreach ($jobs as $job)
                                                        <option value={{$job->id}}>{{$job->title}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <div id="applicant_data">

                                                </div>
                                            </td>
                                            <td>
                                                <button type="submit" disabled="disabled" class="btn btn-primary">Invite Candidate</button>
                                            </td>
                                        </tr>
                                        <input type="hidden" id="select_applicant_hidden" name="select_applicant_hidden">
                                        <input type="hidden" id="user_id" name="user_id" value="{{Auth::user()->id}}">
                                        <input type="hidden" id="event_id" name="event_id" value="{{$event->id}}">
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
<script type="text/javascript">

$('#applicant_select').on('change', function(){
    alert(this.value);
})
function getval(e) {
    $('#applicant_data').html('');
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        url: '/api/employer/getApplicants',
        type: 'POST',
        data: {_token: CSRF_TOKEN, data:e.value},
        dataType: 'JSON',
        success: function (data) {
            console.log(data.applicants)
            var html = '<select required="required" onchange="getSelect(this);" id="applicant_select" name="applicant_select" class="form-control"><option  disabled="disabled" > Please Select A job You Represent</option>';
                    data.applicants.forEach((option,i) => {
                        if(i==0){
                            html+= '<option selected value="'+option.id+'">'+option.title+'</option>';
                            console.log(jQuery(e).parent().parent().next('input[name="select_applicant_hidden"]').val(option.id));
                        } else {
                            html+= '<option value="'+option.id+'">'+option.title+'</option>';
                        }
                    });
                    html+='</select>'
                $('#applicant_data').append(html);
                //form
                $('#applicant_data').parent().parent().parent().find('form').css('color','red');
                //getvalue of created input
                // console.log($('#applicant_data').html());
                $(e).parent().next('td').next('td').find('button').prop('disabled',false);
        }
    });

}
function getSelect(e) {
    let value = $(e).find("option:selected").val();
    console.log($(e).parent().parent().parent().next('input[name="select_applicant_hidden"]').val(value));
}
</script>
    @endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush

