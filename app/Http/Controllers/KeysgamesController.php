<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\customer;
use App\Models\game;
use App\Models\Keysgame;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KeysgamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $game = game::get();
        $user = User::get();
        $keygame = Keysgame::get();

        return view('dashboard', compact('game', 'user', 'keygame'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $games = game::get();
        $customers = customer::get();
        return view('keysgames.create', compact('games'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

        $requestData = $request->all();
        $game = game::get();
        $key = request('key');
        $found = Keysgame::where('key', $key)->count();
       



        if ($found == 1) {
            $request->$key = $key;
            return redirect()->back()->with('flash_message', 'already have');;
        } else {
            Keysgame::create($requestData);
            return view('dashboard', compact('game'));
        }


        // return redirect('keygames')->with('flash_message', 'Keysgame added!');
    }
    
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $keysgame = Keysgame::findOrFail($id);

        return view('keysgames.show', compact('keysgame'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $keysgame = Keysgame::findOrFail($id);
        $games = game::get();
        $customers = customer::get();
        $user = User::get();
        return view('keysgames.edit', compact('keysgame', 'games', 'customers', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {

        $requestData = $request->all();

        $keysgame = Keysgame::findOrFail($id);
        $keysgame->update($requestData);



        // return redirect('keygames')->with('flash_message', 'Keysgame updated!');
        return redirect()->route('game.show', $requestData['game_id']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {


        $keysgame = Keysgame::findOrFail($id);
        $game_id = $keysgame->game_id;
        Keysgame::destroy($id);
        // return redirect('keygames')->with('flash_message', 'Keysgame deleted!');

        return redirect()->route('game.show', $game_id);
    }
}
