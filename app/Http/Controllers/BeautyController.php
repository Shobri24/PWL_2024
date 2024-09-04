<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BeautyController extends Controller
{
    public function beauty_health()
    {
        return view('pos.beauty_health');
    }
}
