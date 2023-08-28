<!-- Modal -->
<div class="modal fade" id="editeModal{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edite</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('products.update',$product->id)}}" method="post" autocomplete="off">
            @csrf
            @method('put')
            <div class="modal-body">
                <div class="form-group">
                    <label for="name" class="col-form-label">Section Name:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$product->name}}">
                </div>            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary"> Update </button>
            </div>
        </form>
      </div>
    </div>
  </div>