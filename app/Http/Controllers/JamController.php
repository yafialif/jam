<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jamsetting;
use App\Slider1;
use App\Slider2;

class JamController extends Controller
{
    //
    function index(){
        $slider1 = Slider1::select('image')->get();
        $slider2 = Slider2::all();
        $jamsetting = Jamsetting::all();
        return view('jam.skin1.index', compact('jamsetting', 'slider1','slider2'));
    }
}
