<!-- Modal -->
<div class="modal fade" id="deleteModal{{$section->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> Delete</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="/sections/{{$section->id}}" method="post" autocomplete="off">
            @csrf
            @method('delete')
            <div class="modal-body">
                <div class="form-group">
                    <label for="name" class="col-form-label">{{$section->name}}</label>
                    <P> هل انت متاكد من عملية الحذف</P>
                </div>            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-danger"> Yes </button>
            </div>
        </form>
      </div>
    </div>
  </div>