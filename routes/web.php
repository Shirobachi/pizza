<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\accessController;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('register', [accessController::class, 'register']) -> name('register');
Route::post('register', [UserController::class, 'create']);

Route::get('login', [accessController::class, 'login']) -> name('login');
Route::post('login', [UserController::class, 'index']);

Route::get('logout', function () { session()->forget('userID'); $info['desc'] = __('auth.logOutOk'); return view('auth.login', compact('info')); });

Route::get('admin/pizza', [UserController::class, 'index']) -> name('logged');