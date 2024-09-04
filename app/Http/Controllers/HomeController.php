<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function welcome() {
        return 'Selamat Datang';
    }

    public function index() {
        return view('POS.home');
    }
}
