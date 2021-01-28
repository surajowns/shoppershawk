<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
         return view('front.index');
    }
    public function Register(Request $request)
    {
        return view('front.common.register');
    }
    public function Login(Request $request)
    {
        return view('front.common.login');
    }
}
