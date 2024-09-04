<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeCareController extends Controller
{
    public function home_care()
    {
        return view('pos.home_care');
    }
}
