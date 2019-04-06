<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jamsetting;

class JamController extends Controller
{
    //
    function index(){
        $jamsetting = Jamsetting::all();
        return view('jam.skin1.index', compact('jamsetting'));
    }
}
