<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class books extends Model
{
    protected $table = 'books';
    protected $fillable = ['title',"summary","image","genre_id"];

    public function genre()
    {
        return $this->belongsTo(genre::class,"genre_id");
    }

    public function commets()
    {
        return $this->hasmany(Commets::class,"books_id");
    }
}
