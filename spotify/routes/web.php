<?php

use App\Models\music;
use App\Models\category;
use App\Models\album;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\Group;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\MusicController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


//route for dashboard

Route::get('/dashboard', function () {
    $id = Auth::user()->id;
    $user = User::where('role_id', '3')->get();
    $music = music::with('user')->get();
    $category = category::all();
    $album = album::all();
    return view('dashboard', ['music' => $music,'category'=>$category , 'album'=>$album , 'user'=>$user]);
})->middleware(['auth', 'verified', 'isUser'])->name('dashboard');

//route for allAlbums

Route::get('/allAlbums', function () {
    $id = Auth::user()->id;
    $user = User::where('role_id', '3')->get();
    $music = music::with('user')->get();
    $category = category::all();
    $album = album::all();
    return view('allAlbums', ['music' => $music,'category'=>$category , 'album'=>$album , 'user'=>$user]);
})->middleware(['auth', 'verified', 'isUser'])->name('allAlbums');

// route for music_play

Route::get('/music_play/{id}', function ($artist_id) {
    $id = Auth::user();
    $artist = User::where('id', $artist_id)->first();
    $music = music::where('user_id', $artist_id)->get();
    // dd($music);
    $category = category::all();
    $album = album::all();
    // dd($artist);
    return view('music_play', ['music' => $music,'category'=>$category , 'album'=>$album , 'artist'=>$artist]);
})->middleware(['auth', 'verified', 'isUser'])->name('music_play');

//route for albumplay

route::get('/albumplay/{id}', function ($album_id) {
    // $id = Auth::user()->id;
    $album = album::where('id', $album_id)->first();
    $music = Music::where("album_id", "=", $album_id)->get();
    // dd($album);
    return view('albumplay', ['music' => $music , 'album'=>$album]);
})->middleware(['auth', 'verified', 'isUser'])->name('albumplay');

//route for song

Route::get('/song', function () {
    $id = Auth::user()->id;
    $music = music::where("user_id", "=", $id)->get();
    $category = category::all();
    return view('song', ['music' => $music,'category'=>$category ]);
})->middleware(['auth', 'verified', 'isArtist'])->name('song');

// route for category

Route::get('/categories', function () {
    return view('categories');
})->middleware(['auth', 'verified', 'isAdmin'])->name('categories');

 // route for music

Route::get('music', function () {
    return view('music');
})->middleware(['auth', 'verified', 'isArtist'])->name('music');



// route for profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

    //  route for category
Route::group([
    'middleware' => 'isAdmin'
],function(){
    Route::get('/category', [CategoryController::class, 'index'])->name('category');
    Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
    Route::put('/category/{category}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
});


// route for music

 Route::group([
        'middleware' => 'isArtist'
 ],function(){
     Route::get('/music', [MusicController::class, 'index'])->name('music');
    //  Route::get('/Music', [MusicController::class, 'index'])->name('music');
     Route::get('/dashboard_artist', [MusicController::class, 'dashboard_artist'])->name('music');
     Route::post('/music', [MusicController::class, 'store'])->name('music.store');
     Route::put('/music/{music}', [MusicController::class, 'update'])->name('music.update');
     Route::delete('/music/{id}', [MusicController::class, 'destroy'])->name('music.destroy');

     // route for album
     Route::get('/album', [AlbumController::class, 'index'])->name('album');
     Route::get('/dashboard_artist', [MusicController::class, 'dashboard_artist'])->name('album');
     Route::post('/album', [AlbumController::class, 'store'])->name('album.store');
     Route::put('/album/{album}', [AlbumController::class, 'update'])->name('album.update');
     Route::delete('/album/{id}', [AlbumController::class, 'destroy'])->name('album.destroy');
 });

require __DIR__.'/auth.php';
