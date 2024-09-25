<?php

namespace App\Http\Controllers;

use App\Models\Musician;
use Illuminate\Http\Request;

class MusicianController extends Controller
{
    function index(){
        // Builder  whereIn  first   orderBy   orderByDesc
        // Collection  where   first   sortBy  sortByDesc
        $musicians = Musician::simplePaginate(10);
        return view('musician.index',compact('musicians'));
    }
    function create(){
        return view('musician.create');
    }
    function show(Musician $musician){
        return view('musician.show',compact('musician'));
    }
    function store(){
        request()->validate($this->getMusicianValidationRule());
        Musician::create([...request()->except('_token'),'slug' => str()->slug(request()->name)]);
        return redirect()->route('musician.index');
    }
    function edit(Musician $musician){
        return view('musician.edit',compact('musician'));
    }
    function update(Musician $musician){
        request()->validate($this->getMusicianValidationRule());
        $musician->update([...request()->except('_token','_method'),'slug' => str()->slug(request()->name)]);
        return redirect()->route('musician.index');
    }
    function destroy(Musician $musician){
        $musician->delete();
        return redirect()->route('musician.index');
    }
    private function getMusicianValidationRule(){
        return [
            'name' => 'required|string|min:3|max:20',
            'city' => ['required'],
            'street' => 'required',
            'phone' => 'required',
            'gender' => 'required',
        ];
    }
}
