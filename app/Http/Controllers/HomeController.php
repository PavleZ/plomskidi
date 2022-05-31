<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function login(){
        return view("login");
    }
    public function register(){
        return view("register");
    }
    public function userHome(){
        return view('userHome');
    }
//    public function adminHome(){
//        return view('adminHome');
//    }
}
