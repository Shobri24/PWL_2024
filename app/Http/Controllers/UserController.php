<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show($id, $name)
    {
        return view('pos.show', ['id' => $id, 'name' => $name]);
    }
}
