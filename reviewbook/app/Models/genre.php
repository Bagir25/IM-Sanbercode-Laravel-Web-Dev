<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class genre extends Model
{
    protected $table = 'genre';
    protected $fillable = ['nama',"descripion"];

    public function books()
    {
        return $this->hasMany(books::class,"genre_id");
    }
}
