@extends("layouts.master")
@section("title")
   Edit Movie
@endsection
@section("content")

<form action="/books/{{$books->id}}" method="POST" enctype="multipart/form-data">
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
    @method("put")
    <div class="mb-3">
        <label class="form-label">genre</label><br>
       <select name="genre_id" id="" class="from-control">
        <option value="">--select a--</option>
        @forelse ($genre as $item)
        @if ($item->id === $books->genre_id)
        <option value="{{$item->id}}" selected>{{$item->nama}}</option>      
        @else
        <option value="{{$item->id}}">{{$item->nama}}</option>      
            
        @endif
        @empty
            <option value="">tidak ada genre</option>
        @endforelse
       </select>
      </div> 
    <div class="mb-3">
      <label class="form-label">title</label>
      <input type="text" name="title" value="{{$books->title}}" class="form-control" >
    </div>
    <div class="mb-3">
      <label class="form-label">summary</label><br>
      <textarea name="summary" class="from-control" cols="30" rows="10">{{$books->summary}}</textarea>
    </div> 
      <div class="mb-3">
        <label class="form-label">image</label><br>
        <input type="file" class="from-control" name="image">
      </div> 
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

@endsection