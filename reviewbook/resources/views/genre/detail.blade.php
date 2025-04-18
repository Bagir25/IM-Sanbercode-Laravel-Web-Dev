@extends("layouts.master")
@section("title")
   detail genre
@endsection
@section("content")

<h1 class="text-primary">{{$genre->nama}}</h1>
<p>{{$genre->description}}</p>

<hr>

<div class="row">
@forelse ($genre->books as $item)

          <div class="col-4">
              <div class="card" >
                  <img src="{{asset("image/".$item->image)}}" class="card-img-top" height="300px" alt="...">
                  <div class="card-body">
                    <h4 class="card-title text-primary">{{$item->title}}</h4>
                    <p class="card-text">{{Str::limit($item->summary,100)}}</p>
                    <div class="d-grid">
                    <a href="/books/{{$item->id}}" class="btn btn-info">Read More</a>
                    </div>
                  </div>
               </div>
          </div>
        @empty
          <h1>Tidak ada books di genre ini</h1>
      @endforelse
    </div>


<a href="/genre" class="btn btn-secondary btn-sm my-3">kembali</a>

@endsection