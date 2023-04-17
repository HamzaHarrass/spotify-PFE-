<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\demande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DemandeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store()
    {
        $demande = new demande();
        $user = Auth::user();

        if($user->role_id != 2){
            return redirect()->back()->with('error', 'You are not allowed to do this action');
        }
        if($user->demande){
            return redirect()->back()->with('error', 'You have already sent a request');
        }

        $demande->name = $user->name;
        $demande->user_id = $user->id;
        $demande->save();
        return redirect()->back()->with('success', 'Your request has been sent');
    }

    /**
     * Display the specified resource.
     */
    public function show(demande $demande)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(demande $demande)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, demande $demande)
    {
        $user= User::find($demande->user_id); //find the user who sent the request
        $user->role_id = 3;//change his role to artist
        $user -> save(); //save the changes
        $demande->delete();//delete the request
        return redirect()->back()->with('success', 'Your request has been accepted');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(demande $demande)
    {
        //
    }
}
