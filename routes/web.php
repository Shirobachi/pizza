<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\accessController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\IngredientController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('register', [accessController::class, 'register']) -> name('register');
Route::post('register', [UserController::class, 'create']);

Route::get('login', [accessController::class, 'login']) -> name('login');
Route::post('login', [UserController::class, 'index']);

Route::get('logout', function () { session()->forget('userID'); $info['desc'] = __('auth.logOutOk'); return view('auth.login', compact('info')); });

Route::get('admin/pizza', [PizzaController::class, 'index']) -> name('logged');

Route::prefix('admin/ingredient')->group(function () {
  Route::get('', [accessController::class, 'ingredients']);
  Route::get('new', [accessController::class, 'ingredientNew']);
  Route::post('new', [IngredientController::class, 'store']);
  Route::get('delete/{id}', [IngredientController::class, 'destroy']);
});

Route::get('test', function () { 
  // dd(App\Models\ingredient::all());
  dD(App\Models\ingredient::_get());
});