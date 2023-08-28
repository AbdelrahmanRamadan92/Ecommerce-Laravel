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

            <div class="modal-body">
                <div class="form-group">
                    <label for="name" class="col-form-label">Product Name:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$product->name}}">
                </div>            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary"> Update </button>
            </div>
        </form>
        <form action="{{route('products.store')}}" method="post" autocomplete="off" enctype="multipart/form-data">
          @csrf
          @method('put')          
          <div class="modal-body">
              <div class="form-group">
                  <label for="name" class="col-form-label">Product Name:</label>
                  <input type="text" class="form-control" id="name" name="name" value="{{ $product->name}}">
              </div>
              <div class="form-group">
                <label for="price" class="col-form-label">Product Price:</label>
                <input type="number" class="form-control" id="price" name="price" step="0.1" value="{{ $product->price}}">
            </div>
            <div class="form-group">
              <label for="category_id" class="col-form-label">Product Category:</label>
              <select name="category_id" class="form-control " >
                  <option value="" selected disabled> Choose Category</option>
                  @foreach ($categories as $category)
                      <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                  @endforeach
              </select>
          </div>                 
          <div class="form-group">
            <label for="filename" class="col-form-label">Product Image:</label>
            <input type="file" class="form-control" id="filename" name="filename">
            <img src="{{URL::asset('dashboard/uploads/products/'.$product->image->filename)}}" alt="{{$product->name}}" height="50" width="50">

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