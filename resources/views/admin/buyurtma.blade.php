@extends('admin.index')
@section('content')

<div class="row mt-5">
  <div class="col-md-6 offset-3">
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Nomi</th>
          <th scope="col">Miqdori</th>
        </tr>
      </thead>
      <tbody>
        @foreach($buyurtmas as $buyurtma)
            <tr>
                <th scope="row">{{ $buyurtma->id }}</th>
                <td>{{ $buyurtma->nomi }}</td>
                <td>{{ $buyurtma->miqdori }}</td>
            </tr>
        @endforeach
      </tbody>
    </table>  
</div>
</div>

@endsection