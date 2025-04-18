<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\books;
use App\Models\genre;
use File;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use App\Http\Middleware\isadmin;
use Illuminate\Support\Facades\Auth;

class booksController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware(['auth', isadmin::class], except: ['index',"show",]),
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = books::all();

        return view("books.tampil",["books"=> $books]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genre = genre::all();
        return view("books.tambah",["genre" => $genre]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "title"=>"required",
            "summary"=>"required",
            "genre_id"=>"required",
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
        ]);
        //buat nama gambar uniq
        $imageuniqname = time().".".$request->image->extension();

        //tempat nyimpan gambar
        $request->image->move(public_path("image"),$imageuniqname);

        //insert data
        $books = new books;
 
        $books->title = $request->input("title");
        $books->summary = $request->input("summary");
        $books->genre_id = $request->input("genre_id");
        $books->image = $imageuniqname;

        $books->save();
 
        return redirect('/books');

    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $books = books::find ($id);
        return view("books.detail",["books"=> $books]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $books = books::find ($id);
        $genre = genre::all();
        return view("books.edit",["books"=>$books,"genre"=>$genre]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "title"=>"required",
            "summary"=>"required",
            "genre_id"=>"required",
            'image' => 'mimes:png,jpg,jpeg,jfif|max:2048',
        ]);
    

        $books = books::find ($id);

        if ($request->has("image")){
            // hapus data lama
            File::delete("image/".$books->image);

            //buat nama gambar uniq
            $imageuniqname = time().".".$request->image->extension();

            //tempat nyimpan gambar
            $request->image->move(public_path("image"),$imageuniqname);

            $books->image = $imageuniqname;
        }  
        $books->title = $request->input("title");
        $books->summary = $request->input("summary");
        $books->genre_id = $request->input("genre_id");

        $books->save();
 
        return redirect('/books');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $books = books::find($id);
        // hapus file gambar
        File::delete("image/".$books->image);

        $books->delete(); 
        return redirect("/books");
    }

}
