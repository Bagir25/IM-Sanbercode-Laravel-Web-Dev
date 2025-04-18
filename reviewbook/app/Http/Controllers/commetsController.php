<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commets;
use Illuminate\Support\Facades\Auth;

class commetsController extends Controller
{
    public function comment(Request $request,$books_id){
        $request->validate([
            'content' => 'required'
        ]);

        $userId = Auth::id();

        $commets = new commets;
        $commets->content = $request->input("content");
        $commets->books_id = $books_id;
        $commets->user_id = $userId;

        $commets->save();

        return redirect("/books/". $books_id);
    }
}
