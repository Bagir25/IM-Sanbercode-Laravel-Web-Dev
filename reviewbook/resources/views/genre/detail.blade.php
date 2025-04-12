@extends("layouts.master")
@section("title")
   detail genre
@endsection
@section("content")

<h1 class="text-primary">{{$genre->nama}}</h1>
<p>{{$genre->description}}</p>

<a href="/genre" class="btn btn-secondary btn-sm">kembali</a>

@endsection