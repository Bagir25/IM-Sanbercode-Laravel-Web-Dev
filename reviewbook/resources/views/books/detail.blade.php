@extends("layouts.master")
@section("title")
   Detail Movie
@endsection
@section("content")
<img src="{{asset("image/". $books->image)}}" width="100%" height="500px">
<h1 class ="text-info">{{$books->title}}</h1>
<p>{{$books->summary}}</p>
<a href="/books" class="btn btn-secondary">kembali</a>
<hr>

<h1>List Komentar</h1>
@forelse ($books->commets as $item )

<div class="card my-3">
  <div class="card-header">
    {{$item->owner->nama}}
  </div>
  <div class="card-body">

    <p class="card-text">{{$item->content}}</p>

  </div>
</div>
@empty
  <h3>Tidak Ada komentar</h3>
@endforelse

<hr>
<h3>Buat Komentar</h3>
@auth
<form action="/commets/{{$books->id}}" method="POST" enctype="multipart/form-data">
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
     
     <textarea name="content" class="from-control" placeholder="Isi Komentar..." cols="30" rows="10"></textarea>
   </div> 

   <button type="submit" class="btn btn-primary">Buat Komentar</button>
 </form>
    
@endauth
@endsection