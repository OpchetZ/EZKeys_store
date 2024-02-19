<?php

namespace App\Http\Controllers;

use App\Models\game;
use App\Models\Keysgame;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class dashboard extends Controller
{
    public function index(Request $request){

        $game = game::get();
        $user = User::get();
        $keygame = Keysgame::get();

        return view('dashboard',compact('game','user','keygame'));
    }

    public function show($id){
        $user = Auth::user();
        $game = game::get();
        
        $keygame = Keysgame::get();

        return view('Mykey',compact('user'));
    }
}
