@extends("layouts.master")
@section("title")
   Tambah genre
@endsection
@section("content")

<form action="/genre" method="POST">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @csrf
    <div class="mb-3">
      <label class="form-label">Genre name</label>
      <input type="text" name="nama" class="form-control" >
    </div>
    <div class="mb-3">
      <label class="form-label">Description</label><br>
      <textarea name="description" class="from-control" cols="30" rows="10"></textarea>
    </div> 
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

@endsection