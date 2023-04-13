<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = category::all();
        return view('categories', ['category' => $category]);
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
            'image' => 'required|image|mimes:jpg|max:2048',
        ]);

        $category = new category(); //create new instance of category
        $category->name = $request->name;
        $category->image = $request->file('image')->store('public/images');
        $category->image = str_replace('public/', 'storage/', $category->image);
        $category->save();
        return redirect()->route('category');
        // $this->index();
    }

    /**
     * Display the specified resource.
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, category $category)
    {
        $request->validate([
            'name' => 'required|max:10',
            'image' => 'required|image|mimes:jpg|max:2048',
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('public/images');
            $image_url = str_replace('public/', 'storage/', $image);
        }
        $category->update(['name'=>$request->name,'image'=>$image_url]);
        return redirect()->route('category');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = category::find($id);
        $category->delete();
        return redirect()->back();
    }
}
