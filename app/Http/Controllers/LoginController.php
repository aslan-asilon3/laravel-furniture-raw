<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('myauth.login');
    }

    public function register()
    {
        return view('myauth.register');
    }
}
