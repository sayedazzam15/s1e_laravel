<?php

namespace App\Http\Controllers;

use App\Models\Musician;
use Illuminate\Http\Request;

class MusicianController extends Controller
{
    function index(){
        $musicians = Musician::orderBy('id','DESC')->simplePaginate(10);
        return view('musician.index',compact('musicians'));
    }
    function create(){
        return view('musician.create');
    }
    function store(){
        request()->validate($this->getMusicianValidationRule());
        Musician::create(request()->except('_token'));
        return redirect()->route('musician.index');
    }
    function show($id){
        $musician = Musician::find($id);
        return view('musician.edit',compact('musician'));
    }
    function update($id){
        request()->validate($this->getMusicianValidationRule());
        Musician::where('id',$id)->update(request()->except('_token','_method'));
        return redirect()->route('musician.index');
    }
    function destroy($id){
        $musician =  Musician::findOrFail($id);
        $musician->delete();
        return redirect()->route('musician.index');
    }
    private function getMusicianValidationRule(){
        return [
            'name' => 'required|string|min:3|max:10',
            'city' => ['required'],
            'street' => 'required',
            'phone' => 'required',
            'gender' => 'required',
        ];
    }
}
