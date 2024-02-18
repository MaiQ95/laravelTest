<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
    Route::view('/', 'welcome');

    Route::view('dashboard', 'dashboard')
      ->middleware(['auth', 'verified'])
      ->name('dashboard');

    Route::view('profile', 'profile')
      ->middleware(['auth'])
      ->name('profile');



    //App way of handling routes (not as in the tutorial)
    Route::get('roles', [RoleController::class, 'index'])
      ->middleware(['auth', 'verified'])
      ->name('roles');

    Route::get('users', [UserController::class, 'index'])
      ->middleware(['auth', 'verified'])
      ->name('users');

    Route::get('products', [ProductController::class, 'index'])
      ->middleware(['auth', 'verified'])
      ->name('products');

require __DIR__.'/auth.php';
