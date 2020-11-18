@extends ('admin.index')
@section ('content')
    <div class="row">
      <div class="offset-3 col-md-6">
        <form action="/insert_menu" method="post" enctype="multipart/form-data">
          {{@csrf_field()}}
            <div class="form-group mt-5">
                <label>Name</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group mt-5">
                <label>Type</label>
                <input type="text" name="type" class="form-control">
            </div>
            <div class="form-group">
              <label>Text</label>
              <textarea name="text" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label>Cost</label>
                <input type="text" name="cost" class="form-control">
            </div>
            <div class="form-group">
                <label for="exampleFormControlFile1">Image</label>
                <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
@endsection