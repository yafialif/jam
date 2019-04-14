<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jamsetting;
use App\Slider1;

class JamController extends Controller
{
    //
    function index(){
        $slider1 = Slider1::select('image')->get();
        $jamsetting = Jamsetting::all();
        return view('jam.skin1.index', compact('jamsetting', 'slider1'));
    }
}
