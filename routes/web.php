<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\MusicianController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SongController;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth:supervisor,admin', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


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


// Route::resource('song',SongController::class)->middleware(['auth:supervisor,admin']);


// role           admin   supervisor
// permission   1,2,3,4    5,6,7
// admin -> assignPermsission 1,2,3,4
// supervisor -> assignPermsission  5,6,7
// $user->assignRole('admin');

Route::get('song',[SongController::class,'index'])->name('song.index');

Route::middleware('auth:supervisor,admin')->group(function(){
    Route::get('/song/{song}',[SongController::class,'show'])->name('song.show');
    Route::get('/update/song/{song}',[SongController::class,'edit'])->name('song.edit')->can('song.update');

    Route::post('song',[SongController::class,'store'])->name('song.store');
    Route::delete('song/{song}',[SongController::class,'destroy'])->name('song.destroy');
    Route::put('song/{song}',[SongController::class,'update'])->name('song.update');
    Route::get('/create/song',[SongController::class,'create'])->name('song.create');
});



Route::resource('musician',MusicianController::class);

Route::get('/hash', function () {
});





require __DIR__.'/auth.php';
