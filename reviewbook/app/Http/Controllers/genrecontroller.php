<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\genre;

class genrecontroller extends Controller
{
    public function create(){
        return view("genre.tambah");
    }

    public function store(request $request){
        $request->validate([
            'nama' => ['required','min:5'],
            'description' => ['required'],
        ],[
            'required' => 'inputan :attribute harus diisi',
            'min' => 'inputan:attribute minimal :min karakter',
        ]);

        $now = Carbon::now();

        DB::table('genre')->insert([
            'nama' => $request->input("nama"),
            'description' => $request->input("description"),
            "created_at" => $now,
            "updated_at" => $now
        ]);

        return redirect("/genre");
    }

    public function lists(){
        $genre = DB::table('genre')->get();
 
        return view('genre.tampil', ['genre' => $genre]);
    }

    public function show($id){
        $genre = genre::find($id);

        return view("genre.detail",["genre"=>$genre]);
    }

    public function edit($id){
        $genre = DB::table("genre")->find($id);

        return view("genre.edit",["genre"=>$genre]);
    }

    public function update ($id, request $request){
        $request->validate([
            'nama' => ['required','min:5'],
            'description' => ['required'],
        ],[
            'required' => 'inputan :attribute harus diisi',
            'min' => 'inputan:attribute minimal :min karakter',
        ]);

        $now = Carbon::now();
        DB::table('genre')
            ->where('id', $id)
            ->update(
                [
                    'nama' => $request->input ("nama"),
                    'description' => $request->input ("description"),
                    'updated_at' => $now
                ]
            );
            return redirect("/genre");
    }

    public function destroy($id){
        DB::table('genre')->where('id', $id)->delete();

        return redirect("/genre");
    }
}
