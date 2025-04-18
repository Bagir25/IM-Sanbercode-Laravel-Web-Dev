@extends("layouts.master")
@section("title")
   List genre
@endsection
@section("content")

@auth
  @if (Auth()->user()->role === "admin")
    <a href="/genre/create" class="btn btn-primary btn-sm my-3">tambah</a>
  @endif
@endauth

<table class="table">
    <tbody>
        @forelse ($genre as $item)
        <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{$item->nama}}</td>
            <td>
                <form action="/genre/{{$item->id}}" method="post">
                    @csrf
                    @method("delete")

                    <a href="/genre/{{$item->id}}" class="btn btn-info btn-sm">detail</a>
                  @auth
                  @if (Auth()->user()->role === "admin")
                  <a href="/genre/{{$item->id}}/edit" class="btn btn-warning btn-sm">edit</a>
                  
                  <input type="submit" value="delate" class="btn btn-danger btn-sm">
                  @endif
                  @endauth
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td>no data</td>
        </tr>
        @endforelse

    </tbody>
  </table>

@endsection