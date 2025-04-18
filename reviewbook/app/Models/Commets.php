<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commets extends Model
{
    protected $table = 'commets';
    protected $fillable = ['user_id',"books_id","content"];

    public function owner()
    {
        return $this->belongsTo(User::class,"user_id");
    }
}

