<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;
    protected $fillable = ['title','author','album_id'];
    function album(){
        return $this->belongsTo(Album::class);
    }
    function musicians(){
        return $this->belongsToMany(Musician::class,'musician_perform_songs');
    }
}
