<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\accessController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\pizzasIngredientsController;

Route::get('', [accessController::class, 'welcome']);

Route::get('register', [accessController::class, 'register']) -> name('register');
Route::post('register', [UserController::class, 'create']);

Route::get('login', [accessController::class, 'login']) -> name('login');
Route::post('login', [UserController::class, 'index']);

Route::get('logout', function () { session()->forget('userID'); $info['desc'] = __('auth.logOutOk'); return view('auth.login', compact('info')); });

Route::prefix('admin/pizza')->group(function () {
  Route::get('', [accessController::class, 'pizzas']) -> name('logged');
  Route::get('new', [accessController::class, 'pizzaNew']);
  Route::post('new', [PizzaController::class, 'store']);
  Route::get('delete/{id}', [PizzaController::class, 'destroy']);
  Route::prefix('ingredient/{id}')->group(function () {
    Route::get('', [accessController::class, 'pizzaIngredients']);
    Route::get('delete/{idI}', [pizzasIngredientsController::class, 'destroy']);
    Route::get('new', [accessController::class, 'pizzaIngredientsAdd']);
    Route::post('new', [pizzasIngredientsController::class, 'store']);
  });
});

Route::prefix('admin/ingredient')->group(function () {
  Route::get('', [accessController::class, 'ingredients']);
  Route::get('new', [accessController::class, 'ingredientNew']);
  Route::post('new', [IngredientController::class, 'store']);
  Route::get('delete/{id}', [IngredientController::class, 'destroy']);
});

Route::get('test', function () { 
  // dd(App\Models\ingredient::all());
  dD(App\Models\pizzasIngredient::_get(2));
});