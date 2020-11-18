@extends ('admin.index')
@section ('content')
<div class="row mt-5">
      <div class="offset-3 col-md-6">
        <form action="/insert_instagram" method="post" enctype="multipart/form-data">
          {{@csrf_field()}}
            <div class="form-group">
                <label for="exampleFormControlFile1">Image</label>
                <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
@endsection
