<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BabyController extends Controller
{
    public function baby_kid()
    {
        return view('pos.baby_kid');
    }
}
