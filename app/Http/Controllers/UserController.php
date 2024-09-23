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
       /* $user = UserModel::firstOrNew(
            [
                'username' => 'manager55',
                'nama' => 'Manager55',
                'password' => Hash::make('12345'),
                'level_id' => 2,
            ]);

            $user->username = 'manager56';
            $user->isDirty();
            $user->isDirty('username');
            $user->isDirty('nama');
            $user->isDirty(['nama', 'username']);
            
            $user->isClean();
            $user->isClean('username');
            $user->isClean('nama');
            $user->isClean(['nama', 'username']);

            $user->isDirty();
            $user->isClean();
            dd($user->isDirty());
            */

            $user = UserModel::create(
                [
                    'username' => 'manager11',
                    'nama' => 'Manager11',
                    'password' => Hash::make('12345'),
                    'level_id' => 2,
                ]);
    
                $user->username = 'manager12';
                $user->save();
                $user->wasChanged();
                $user->wasChanged('username');
                $user->wasChanged(['username', 'level_id']);
                $user->wasChanged('nama');
                dd($user->wasChanged(['nama', 'username']));
        }
}
