<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Keysgame;
use Illuminate\Http\Request;

class KeysgamesController extends Controller
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
            $keysgames = Keysgame::where('no', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->orWhere('key', 'LIKE', "%$keyword%")
                ->orWhere('game_id', 'LIKE', "%$keyword%")
                ->orWhere('key_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $keysgames = Keysgame::latest()->paginate($perPage);
        }

        return view('keysgames.index', compact('keysgames'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('keysgames.create');
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
        
        Keysgame::create($requestData);

        return redirect('keygames')->with('flash_message', 'Keysgame added!');
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

        return view('keysgames.edit', compact('keysgame'));
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

        return redirect('keygames')->with('flash_message', 'Keysgame updated!');
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
        Keysgame::destroy($id);

        return redirect('keygames')->with('flash_message', 'Keysgame deleted!');
    }
}
