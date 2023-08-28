<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('categories.store')}}" method="post" autocomplete="off" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="name" class="col-form-label">Category Name:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
                </div>    
                <div class="form-group">
                  <label for="filename" class="col-form-label">Category Image:</label>
                  <input type="file" class="form-control" id="filename" name="filename" >
              </div>        
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary"> Add </button>
            </div>
        </form>
      </div>
    </div>
  </div>