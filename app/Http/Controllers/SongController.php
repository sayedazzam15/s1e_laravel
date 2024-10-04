<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song; 
use App\Models\Album; 
use App\Models\Musician; 
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // admin   create update delete
        // supervisor   create
        // moderator    update
        // song -> album -> musician
        
        $songs = Song::with('album')->orderByDesc('id')->paginate(10);
        $users = User::verified()->get();
        return view('song.index',compact('songs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $albums = Album::get();
        $musicians = Musician::get();
        return view('song.create',compact('albums','musicians'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate($this->getSongValidationRules());
        $song = Song::create($request->only('title','author','album_id'));
        $song->musicians()->attach($request->musicians);
        return redirect()->route('song.show',$song);
    }

    /**
     * Display the specified resource.
     */
    public function show(Song $song)
    {
        return view('song.show',compact('song'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Song $song)
    {
        $albums = Album::get();
        $musicians = Musician::get();
        return view('song.edit',compact('song','albums','musicians'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Song $song)
    {
        $request->validate($this->getSongValidationRules());
        $song->update($request->only('title','author','album_id'));
        $song->musicians()->detach();
        $song->musicians()->attach($request->musicians);
        return redirect()->route('song.show',$song);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Song $song)
    {
        $song->delete();
        return redirect()->route('song.index');
    }
    private function getSongValidationRules(){
        return [
            'title' => 'required|string',
            'author' => 'required|string',
            'album_id' => 'required|exists:albums,id',
            'musicians' => 'required|array',
            'musicians.*' => 'required|exists:musician,id',
        ];
    }
}
