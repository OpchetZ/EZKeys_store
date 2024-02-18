<?php

namespace App\Http\Controllers;

use App\Models\game;
use Illuminate\Http\Request;

class dashboard extends Controller
{
    public function index(Request $request){

        $game = game::get();


        return view('dashboard',compact('game'));
    }
}
