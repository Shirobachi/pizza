<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class accessController extends Controller
{
  function register(){
    if(session()->has('userID'))
        return redirect(route('logged'));
    else
        return view('auth.register');
  }

  function login(){
    if(session()->has('userID'))
        return redirect(route('logged'));
    else
        return view('auth.login');
  }
}
