<style>
#cv-model-content
{
    width:auto;
}
</style>
<div class="modal fade" id="cv-modal-dialog" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content" id="cv-model-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">{{Auth::user()->name}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
                <form method="POST" action="{{route('job.apply')}}" id="application"  enctype="multipart/form-data">
                <input accept=".pdf" id="application_cv" type="file" name="application_cv">
                @csrf
                @method('post')
                <input name="job_id" type="hidden" value="{{$id}}"/>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-secondary" id="saveApplication">Submit Application</button>
        </form>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    console.log(CSRF_TOKEN);
    $("#saveApplication").on('click',()=>{
        if($('#application_cv').get(0).files.length ===0) {
            alert('Please attach your resume!!!');
            return 0;
        } else {

            $('application').submit();
            // $('#application').on('submit',(e)=>{
            //     e.preventDefault();
            //     var formData = new FormData();
            //     let application = $('#application');
            //     formData.append('resume',application);
            //     $.ajax({
            //         url: '/candidate/application/create/postajax',
            //         type: 'POST',
            //         data: {
            //             "_token":  $('meta[name="csrf-token"]').attr('content'),
            //             form: formData
            //         },
            //         cache: false,
            //         processData: false,
            //         contentType : false,
            //         success: function (data) {
            //             console.log(data.data);
            //         },
            //         error: function (jqXHR, textStatus, errorThrown) {
            //             console.log(jqXHR, textStatus, errorThrown);
            //         }
            //     });
            // });
        }
            // let form = ;
            // let formData = new FormData(form);
    });


  </script>
