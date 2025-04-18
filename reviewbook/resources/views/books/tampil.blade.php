@extends("layouts.master")
@section("title")
   Tampil Movie
@endsection
@section("content")
@auth
  @if (Auth()->user()->role === "admin")
    
  <a href="/books/create" class="btn btn-primary my-3" >+ tambah</a>
  @endif
@endauth

<div class="row">
    @forelse ($books as $item)
        <div class="col-4">
            <div class="card" >
                <img src="{{asset("image/".$item->image)}}" class="card-img-top" height="300pxs" alt="...">
                <div class="card-body">
                  <h4 class="card-title text-primary">{{$item->title}}</h4>
                  <span class="badge bg-success">{{$item->genre->nama}}</span>
                  <p class="card-text">{{Str::limit($item->summary,100)}}</p>
                  <div class="d-grid">
                  <a href="/books/{{$item->id}}" class="btn btn-info">Read More</a>
                  </div>
                  @auth
                  @if (Auth()->user()->role === "admin")
                  <div class="row my-1">
                    <div class="col">
                      <div class="d-grid">
                        <a href="/books/{{$item->id}}/edit" class="btn btn-warning">Edit</a>
                      </div>
                    </div>
                    <div class="col">
                        <form action="/books/{{$item->id}}" method="post">
                            @csrf
                            @method("Delete")
                            <div class="d-grid">
                            <input type="submit" class="btn btn-danger" value="Delete">
                            </form>
                    </div>
                  </div>
                  </div>
                  @endif
                  @endauth
                </div>
              </div>
        </div>
    @empty
        <h5>tidak ada berita</h5>
    @endforelse
</div>

@endsection