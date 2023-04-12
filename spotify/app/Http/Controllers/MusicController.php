<?php

namespace App\Http\Controllers;

use App\Models\music;
use App\Models\category;
use Illuminate\Http\Request;
use Termwind\Components\Dd;

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
        $request->validate([
            'name' => 'required|max:10',
            'category_id' => 'required',
            'user_id' => 'required',
            'audio' => 'required|audio|mimes:mp3|max:5000',
            'image' => 'required|image|mimes:jpg|max:2048',
        ]);

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
        $request->validate([
            'name' => 'required|max:10',
            'category_id' => 'required',
            'user_id' => 'required',
            'audio' => 'required|audio|mimes:mp3|max:5000',
            'image' => 'required|image|mimes:jpg|max:2048',
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('public/images');
            $image_url = str_replace('public/', 'storage/', $image);
        }
        if ($request->hasFile('audio')) {
            $audio = $request->file('audio')->store('public/audios');
            $audio_url = str_replace('public/', 'storage/', $audio);
        }
        $music->update(['name'=>$request->name,'category_id'=>$request->category_id,'image'=>$image_url,'audio'=>$audio_url]);
        return redirect()->route('music');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $music = music::find($id);
        $music->delete();
        return redirect()->back();
    }
}
