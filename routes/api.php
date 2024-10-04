<?php

use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\MusicianController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\SongController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/song',[SongController::class,'index']);
Route::get('/song/{song}',[SongController::class,'show']);


Route::post('/login',LoginController::class);

Route::get('/profile',ProfileController::class)->middleware('auth:sanctum');

Route::get('/musician',[MusicianController::class,'index'])->middleware(['auth:sanctum','abilities:musician.index']);

Route::get('/musician/{musician}',[MusicianController::class,'show'])->middleware(['auth:sanctum','abilities:musician.show']);