<?php

namespace App\Http\Controllers;

use App\Models\ingredient;
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

  function ingredients(){
    if(session()->has('userID')){
      $data['body'] = ingredient::_get();
      $name = 'ingredients';

      return view('admin.show', compact('name', 'data'));
    }
    else{
      $info['desc'] = __('auth.401');
      $info['type'] = 'danger';

      return view('auth.login', compact('info'));
    }
  }

  function ingredientNew(){
    if(session()->has('userID')){
      $new = true;
      $title = __('ingredients.titleNew');
      $name = 'ingredients';

      return view('admin.ingredient', compact('new', 'title', 'name'));
    }
    else{
      $info['desc'] = __('auth.401');
      $info['type'] = 'danger';

      return view('auth.login', compact('info'));
    }

  }
}
