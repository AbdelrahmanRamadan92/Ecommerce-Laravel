<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('products.store')}}" method="post" autocomplete="off" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="name" class="col-form-label">Product Name:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                </div>
                <div class="form-group">
                  <label for="price" class="col-form-label">Product Price:</label>
                  <input type="number" class="form-control" id="price" name="price" step="0.1" value="{{ old('price') }}">
              </div>
              <div class="form-group">
                <label for="category_id" class="col-form-label">Product Category:</label>
                <select name="category_id" class="form-control " >
                    <option value="" selected disabled> Choose Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>                 
            <div class="form-group">
              <label for="filename" class="col-form-label">Product Image:</label>
              <input type="file" class="form-control" id="filename" name="filename">
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