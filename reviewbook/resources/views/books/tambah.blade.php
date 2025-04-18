@extends("layouts.master")
@section("title")
   Tambah Movie
@endsection
@section("content")

<form action="/books" method="POST" enctype="multipart/form-data">
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
        <label class="form-label">genre</label><br>
       <select name="genre_id" id="" class="form-control">
        <option value="">--select a genre- -</option>
        @forelse ($genre as $item)
            <option value="{{$item->id}}">{{$item->nama}}</option>
        @empty
            <option value="">tidak ada genre</option>
        @endforelse
       </select>
      </div> 
    <div class="mb-3">
      <label class="form-label">title</label>
      <input type="text" name="title" class="form-control" >
    </div>
    <div class="mb-3">
      <label class="form-label">summary</label><br>
      <textarea name="summary" class="from-control" cols="30" rows="10"></textarea>
    </div> 
      <div class="mb-3">
        <label class="form-label">image</label><br>
        <input type="file" class="from-control" name="image">
      </div> 
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

@endsection