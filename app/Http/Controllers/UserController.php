<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
   public function index()
{
   // $users = UserModel::where('level_id', 2)->get();
   //dd($user);
   //return view('user', ['data' => $user]);
    $users = UserModel::where('level_id', 2)->get();
    $userCount = $users->count();
    return view('user', ['data' => $users, 'count' => $userCount]);
}


}
