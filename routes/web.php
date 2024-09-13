<?php

use App\Http\Controllers\MusicianController;
use App\Models\Musician;
use Illuminate\Support\Facades\Route;

Route::get('/', [MusicianController::class,'index'])->name('musician.index');
Route::get('/create', [MusicianController::class,'create'])->name('musician.create');
Route::post('/store', [MusicianController::class,'store'])->name('musician.store');
Route::get('/show/{id}', [MusicianController::class,'show'])->name('musician.show');
Route::put('/{id}', [MusicianController::class,'update'])->name('musician.update');
Route::delete('/{id}', [MusicianController::class,'destroy'])->name('musician.destroy');
