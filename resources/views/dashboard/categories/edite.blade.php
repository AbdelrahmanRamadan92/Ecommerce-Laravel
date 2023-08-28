<!-- Modal -->
<div class="modal fade" id="editeModal{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edite</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('categories.update',$category->id)}}" method="post" autocomplete="off" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="modal-body">
                <div class="form-group">
                    <label for="name" class="col-form-label">Category Name:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$category->name}}">
                </div>     
                <div class="form-group">
                  <label for="filename" class="col-form-label">Category Image:</label>
                  <input type="file" class="form-control" id="filename" name="filename" >
              </div>
              <div><img src="{{URL::asset('dashboard/uploads/categories/'.$category->image->filename)}}" alt="{{$category->name}}" height="50" width="50"></div>
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary"> Update </button>
            </div>
        </form>
      </div>
    </div>
  </div>