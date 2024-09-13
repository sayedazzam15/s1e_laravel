<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Musician extends Model
{
    protected $table = 'musician';
    protected $fillable = ['name','phone','city','street','gender'];
    use HasFactory;
}
