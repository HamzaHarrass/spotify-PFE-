<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\music;
use App\Models\demande;
use App\Models\category;
use App\Models\album;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboardAdmin()
    {
        $user = User::where('role_id', '3')->get();
        $music = music::with('user')->get();
        $category = category::all();
        $album = album::all();
        // statistics
        $artistCount = User::where('role_id', '3')->count();
        $userCount = User::where('role_id', '2')->count();
        $albumCount = Album::count();
        $stats = [
            'artistCount' => $artistCount,
            'userCount' => $userCount,
            'albumCount' => $albumCount,
        ];
        // dd($stats);
        return view('dashboardAdmin', ['music' => $music,'category'=>$category , 'album'=>$album , 'user'=>$user, 'stats' => $stats]);
    }

    public function dashboard()
    {
        $user = User::where('role_id', '3')->get();
        $music = music::with('user')->get();
        $category = category::all();
        $album = album::all();
        return view('dashboard', ['music' => $music,'category'=>$category , 'album'=>$album , 'user'=>$user]);
    }
}
