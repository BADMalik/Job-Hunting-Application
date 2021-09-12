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
                <form  enctype="multipart/form-data">
                <input id="application_cv" type="file" name="application_cv">
            </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-secondary" id="saveApplication">Close</button>
        </div>
      </div>
    </div>
  </div>
