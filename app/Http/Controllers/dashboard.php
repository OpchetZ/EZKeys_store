<?php

namespace App\Http\Controllers;

use App\Models\customer;
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
    public function store(Request $request){
        $requestData = $request->all();
        $user = Auth::user();
        $game = game::find($request->id);
        $customer = customer::get();
        $keygame = Keysgame::find($request->game_id);

       $game -> update($requestData);
        
        return view('Mykey', compact('user'));
        
    }
    // public function update(Request $request, $id)
    // {
        
    //     $requestData = $request->all();
        
    //     $keysgame = Keysgame::findOrFail($id);
    //     $keysgame->update($requestData);

        

    //     // return redirect('keygames')->with('flash_message', 'Keysgame updated!');
    //     return view('Mykey', compact('user'));
    // }
    
}
