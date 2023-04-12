<?php

namespace App\Http\Controllers;

use App\Models\music;
use App\Models\category;
use Illuminate\Http\Request;

class MusicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $music = music::all();
        $category = category::all();
        return view('music', ['music' => $music,'category'=>$category]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $music = new music(); //create new instance of music
        $music->name = $request->name;
        $image = $request->file('image')->store('public/images');
        $music->image = str_replace('public/', 'storage/', $image);
        $music->category_id = $request->category_id;
        $music->user_id = $request->user()->id;
        if ($request->hasFile('audio')) {
            $audio = $request->file('audio')->store('public/audios');
            $music->audio = str_replace('public/', 'storage/', $audio);
        }
        //dd($music,$request);
        $music->save();
        return redirect()->route('music');
    }

    /**
     * Display the specified resource.
     */
    public function show(music $music)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
public function edit($id)
{
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, music $music)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $music = category::find($id);
        $music->delete();
        return redirect()->back();
    }
}
