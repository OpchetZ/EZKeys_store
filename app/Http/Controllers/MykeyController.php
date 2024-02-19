<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class MykeyController extends Controller
{
    //
    public function index(Request $request){

        $customer = User::get();
        

        return view('Mykey',compact('customer'));
    }
}
