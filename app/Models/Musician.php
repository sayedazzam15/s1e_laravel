<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Musician extends Model
{
    protected $table = 'musician';
    protected $fillable = ['name','phone','city','street','gender','slug'];
    protected $casts = ['phone'=> 'array'];
    use HasFactory;

    function albums(){
        return $this->hasMany(Album::class);
    }
    function producedSongs(){
        return $this->hasManyThrough(Song::class,Album::class);
    }
    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => strtoupper($value),
        );
    }
}
