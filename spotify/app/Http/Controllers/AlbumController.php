<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\category;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $album = Album::all();
        $category = category::all();
        return view('album', ['album' => $album,'category'=>$category]);
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
        $album = new Album(); //create new instance of album
        $album->name = $request->name;
        $image = $request->file('image')->store('public/images');
        $album->image = str_replace('public/', 'storage/', $image);
        $album->category_id = $request->category_id;
        $album->user_id = $request->user()->id;
        // dd($album,$request);
        $album->save();
        return redirect()->route('album');
    }

    /**
     * Display the specified resource.
     */
    public function show(Album $album)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Album $album)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Album $album)
    {
        $request->validate([
            'name' => 'required|max:10',
            'category_id' => 'required',
            'image' => 'required|image|mimes:jpg|max:2048',
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_path = $image->store('public/images');
            $image_url = str_replace('public/', 'storage/', $image_path);
        }
        $album->update(['name'=>$request->name,'image'=>$image_url]);
        return redirect()->route('album');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $category = Album::find($id);
        $category->delete();
        return redirect()->back();
    }
}
