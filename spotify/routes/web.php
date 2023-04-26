<?php

use App\Models\User;
use App\Models\album;
use App\Models\music;
use App\Models\demande;
use App\Models\category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\Group;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\MusicController;
use App\Http\Controllers\DemandeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

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


Route::middleware(['auth', 'verified'])->group(function () {

    // middleware Admin
    Route::middleware(['isAdmin'])->group(function (){
        Route::get('/categories', function () {
            return view('categories');
        })->name('categories');

        Route::get('/category', [CategoryController::class, 'index'])->name('category');
        Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
        Route::put('/category/{category}', [CategoryController::class, 'update'])->name('category.update');
        Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
        Route::delete('/dashboardAdmin/{request}', [ProfileController::class, 'deleteUser'])->name('profile.deleteUser');
        Route::get('/dashboardAdmin', [DashboardController::class, 'dashboardAdmin'])->name('dashboardAdmin');
        Route::post('/acceptdemande/{demande}', [DemandeController::class, 'update'])->name('acceptdemande.update');
        Route::get('/acceptdemande', [DemandeController::class, 'index'])->name('acceptdemande');

    });

    // middleware Artist
    Route::middleware(['isArtist'])->group(function (){
        Route::get('/song', [MusicController::class, 'song'])->name('song');
        Route::get('music', function () {
            return view('music');
        })->name('music');

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
    });

    // middleware User
    Route::middleware(['isUser'])->group(function (){
        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
        Route::get('/allAlbums', [AlbumController::class, 'allAlbums'])->name('allAlbums');
        Route::get('/music_play/{id}', [MusicController::class, 'musicPlay'])->name('music_play');
        route::get('/albumplay/{id}', [AlbumController::class, 'albumPlay'])->name('albumplay');
        Route::post('/demande', [DemandeController::class, 'store'])->name('demande.store');
    });

    // middleware Admin and Artist
    Route::middleware(['isArtist','isAdmin'])->group(function (){
        Route::delete('/album/{id}', [AlbumController::class, 'destroy'])->name('album.destroy');
    });
});



// route for profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
