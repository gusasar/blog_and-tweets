<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entry;

class EntryController extends Controller
{
    // este constructor proteje  que las funciones accesibles de esta
    // clase sean accesibles si esta logueado

    public function __construct(){
        $this->middleware('auth');
    }

    public function create(){
        return view('entries.create');
    }
    public function store(Request $request){
        //dd($request->all());
        //can validate as follow
        $validaDatos = $request->validate([
            'title' => 'required|min:7|max:255|',
            'content' => 'required|min:15|max:3000'
        ]);

        $entry=new Entry();
        $entry->title=$validaDatos['title'];
        $entry->content=$validaDatos['content'];
        $entry->user_id=auth()->id();
        $entry->save();
        $status="The entry has been published succesfully";
        return back()->with(compact('status'));
    }

    public function edit(Entry $entry){
        return view('entries.edit', compact('entry'));
    }

    public function update(Request $request, Entry $entry){

        //can validate as follow
        $validaDatos = $request->validate([
            'title' => 'required|min:7|max:255|unique:entries,id,'.$entry->id,
            'content' => 'required|min:15|max:3000'
        ]);

        $entry->title=$validaDatos['title'];
        $entry->content=$validaDatos['content'];
        $entry->save();
        $status="The entry has been update succesfully";
        return back()->with(compact('status'));
    }


}
