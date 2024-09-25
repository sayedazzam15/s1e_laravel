<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\MusicianController;
use App\Http\Controllers\SongController;
use App\Http\Middleware\IsAdminMiddleware;
use App\Models\Musician;
use App\Models\Song;
use Illuminate\Foundation\Http\Middleware\ValidateCsrfToken;
use Illuminate\Support\Facades\Route;

// Route::get('/', [MusicianController::class,'index'])->name('musician.index');
// Route::get('/musisican/{musician:slug}', [MusicianController::class,'show'])->name('musician.show');
// Route::get('/create', [MusicianController::class,'create'])->name('musician.create');
// Route::post('/store', [MusicianController::class,'store'])->name('musician.store');
// Route::get('/edit/{musician:slug}', [MusicianController::class,'edit'])->name('musician.edit');
// Route::put('/{musician:slug}', [MusicianController::class,'update'])->name('musician.update');
// Route::delete('/{musician:slug}', [MusicianController::class,'destroy'])->name('musician.destroy');

Route::get('/album', [AlbumController::class,'index'])->name('album.index');

// Route::get('/song', [SongController::class,'index'])->name('song.index');

// Route::get('/song/create', [SongController::class,'create'])->name('song.create');

// Route::post('/song/store', [SongController::class,'store'])->name('song.store');

// Route::get('/song/show/{song:id}', [SongController::class,'show'])->name('song.show');

// Route::get('/song/edit/{song:id}', [SongController::class,'edit'])->name('song.edit');

// Route::put('/song/edit/{song :id}', [SongController::class,'update'])->name('song.update');

// Route::delete('/song/{song:id}', [SongController::class,'destroy'])->name('song.destroy');

Route::get('dashboard',function(){
    dd('welcome to dashboard');
});


Route::middleware(['s1e'])->group(function(){
    // add login and register (with image) to our application
    Route::resource('song',SongController::class)->withoutMiddleware([ValidateCsrfToken::class,IsAdminMiddleware::class]);
    Route::resource('musician',MusicianController::class)->withoutMiddleware(IsAdminMiddleware::class);
});


