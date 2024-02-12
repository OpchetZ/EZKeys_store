<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class gameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;
        
        if (!empty($keyword)) {
            $game = game::
                
                Where('name', 'LIKE', "%$keyword%")
                
                
                ->orWhere('price','LIKE',"%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $game = game::latest()->paginate($perPage);
        }

        return view('game.index', compact('game'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('game.create');
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
        
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('', 'public');
            $requestData['photo'] = url(Storage::url($path));
        }
        game::create($requestData);

        return redirect('game')->with('flash_message', 'game added!');
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
        $game = game::findOrFail($id);

        return view('game.show', compact('game'));
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
        $game = game::findOrFail($id);

        return view('game.edit', compact('game'));
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
        
        $game = game::findOrFail($id);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('', 'public');
            $requestData['photo'] = url(Storage::url($path));
        }
        $game->update($requestData);

        return redirect('game')->with('flash_message', 'game updated!');
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
        game::destroy($id);

        return redirect('game')->with('flash_message', 'game deleted!');
    }
}
