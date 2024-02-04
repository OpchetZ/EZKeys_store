<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\ownerkey;
use Illuminate\Http\Request;

class ownerkeyController extends Controller
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
            $ownerkey = ownerkey::where('name', 'LIKE', "%$keyword%")
                ->orWhere('key', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->orWhere('key_id', 'LIKE', "%$keyword%")
                ->orWhere('game_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $ownerkey = ownerkey::latest()->paginate($perPage);
        }

        return view('ownerkey.index', compact('ownerkey'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('ownerkey.create');
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
        
        ownerkey::create($requestData);

        return redirect('ownerkey')->with('flash_message', 'ownerkey added!');
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
        $ownerkey = ownerkey::findOrFail($id);

        return view('ownerkey.show', compact('ownerkey'));
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
        $ownerkey = ownerkey::findOrFail($id);

        return view('ownerkey.edit', compact('ownerkey'));
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
        
        $ownerkey = ownerkey::findOrFail($id);
        $ownerkey->update($requestData);

        return redirect('ownerkey')->with('flash_message', 'ownerkey updated!');
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
        ownerkey::destroy($id);

        return redirect('ownerkey')->with('flash_message', 'ownerkey deleted!');
    }
}
