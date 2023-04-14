<?php

namespace App\Http\Controllers;

use App\Models\album;
use App\Models\music;
use App\Models\category;
use Termwind\Components\Dd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MusicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id = Auth::user()->id;
        $music = music::where("user_id", "=", Auth::user()->id)->where("user_id", "=", $id)->get();
        $category = category::all();
        $album = album::all();
        // dd($music,$category,$album);
        return view('music', ['music' => $music,'category'=>$category , 'album'=>$album]);

    }


    /**
     * Display a listing of the resource.
     */
    public function dashboard_artist()
    {
        $id = Auth::user()->id;
        $music = music::skip(0)->take(5)->where("user_id", "=", $id)->get();
        $category = category::all();
        $album = album::skip(0)->take(5)->where("user_id", "=", $id)->get();
        return view('dashboardArtist', ['music' => $music,'category'=>$category , 'album'=>$album]);

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
            'name' => 'required|max:50',
            'category_id' => 'required',
            // 'album_id' => 'required',
            'audio' => 'required|mimetypes:audio/mpeg|max:10000',
            'image' => 'required|image|mimes:jpg|max:2048',
        ]);

        $music = new music(); //create new instance of music
        $music->name = $request->name;
        $image = $request->file('image')->store('public/images');
        $music->image = str_replace('public/', 'storage/', $image);
        $music->category_id = $request->category_id;
        $music->album_id = $request->album_id;
        $music->user_id = $request->user()->id;
        if ($request->hasFile('audio')) {
            $audio = $request->file('audio');
            $size_mb = $audio->getSize()/(1024*1000);
            $audio_url = $audio->store('public/audios');
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
            'audio' => 'required|mimetypes:audio/mpeg|max:10000',
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
