<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Musician extends Model
{
    protected $table = 'musician';
    protected $fillable = ['name','phone','city','street','gender','slug'];
    use HasFactory;
    function albums(){
        return $this->hasMany(Album::class);
    }
    function producedSongs(){
        return $this->hasManyThrough(Song::class,Album::class);
    }
}
