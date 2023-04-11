<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MusicController;
use App\Http\Controllers\ProfileController;
use App\Models\category;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/categories', function () {
    return view('categories');
})->middleware(['auth', 'verified'])->name('categories');

Route::get('music', function () {
    return view('music');
})->middleware(['auth', 'verified'])->name('music');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//  Route::resource('user', category::class);
Route::get('/category', [CategoryController::class, 'index'])->name('category');
Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');


Route::get('/music', [MusicController::class, 'index'])->name('music');
Route::post('/music', [MusicController::class, 'store'])->name('music.store');

require __DIR__.'/auth.php';
