<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function hello() {
        return 'Hello World';
    }

     // Tampilkan Pesan ‘Selamat Datang’
     public function index()
     {
         return 'Selamat Datang';
     }
 
     // Tampilkan Nama dan NIM
     public function about()
     {
         return 'Nama: [Shobri], NIM: [2241760092]';
     }
 
     // Tampilkan halaman dinamis /articles/{id}
     public function articles($id)
     {
         return 'Halaman Artikel dengan Id ' . $id;
     }
    
    public function greeting() {
        return view ('blog.hello')
        ->with('name', 'Shobri')
        ->with('occupation', 'Astronaut');
    }
    }
