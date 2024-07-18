<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClockController extends Controller
{
    public function clock()
    {
    //    dd("clock");
        return view('digital-clock');
    }
}
