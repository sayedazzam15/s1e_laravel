<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SongResource;
use Illuminate\Http\Request;
use App\Models\Song;
class SongController extends Controller
{
    function index(){
        $songs = Song::paginate();
    
        return response()->json(['data' => SongResource::collection($songs)]);
    }
    function show(Song $song){
        return response()->json(['data' => new SongResource($song)]);
    }
}
