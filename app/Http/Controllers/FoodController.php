<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function food_beverage()
    {
        return view('pos.food_beverage');
    }
}
