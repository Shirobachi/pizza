<?php

namespace App\Http\Controllers;

use App\Models\ingredient;
use App\Models\pizza;
use App\Models\pizzasIngredient;
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

  function pizzas(){
    if(session()->has('userID')){
      $data['body'] = pizza::_get();
      $name = 'pizzas';

      return view('admin.show', compact('name', 'data'));
    }
    else{
      $info['desc'] = __('auth.401');
      $info['type'] = 'danger';

      return view('auth.login', compact('info'));
    }
  }

  function pizzaNew(){
    if(session()->has('userID')){
      $new = true;
      $title = __('pizzas.titleNew');
      $name = 'pizzas';

      return view('admin.pizza', compact('new', 'title', 'name'));
    }
    else{
      $info['desc'] = __('auth.401');
      $info['type'] = 'danger';

      return view('auth.login', compact('info'));
    }
  }

  function pizzaIngredients($id){
    if(session()->has('userID')){
      $data['body'] = pizzasIngredient::_get($id);
      $name = 'pizzasIngredient';
      $title = 'Pizza\'s ingredients';

      return view('admin.show', compact('name', 'data', 'title'));
    }
    else{
      $info['desc'] = __('auth.401');
      $info['type'] = 'danger';

      return view('auth.login', compact('info'));
    }
  }

  function pizzaIngredientsAdd(){
    if(session()->has('userID')){
      $new = true;
      $data['ingredients'] = ingredient::_get();
      $title = __('pizzasIngredient.titleNew');
      $name = 'pizzasIngredient';

      return view('admin.pizzasIngredient', compact('new', 'title', 'name', 'data'));
    }
    else{
      $info['desc'] = __('auth.401');
      $info['type'] = 'danger';

      return view('auth.login', compact('info'));
    }
  }

  function welcome(){
    $data = pizza::_get();

    return view('welcome', compact('data'));
  }

}
