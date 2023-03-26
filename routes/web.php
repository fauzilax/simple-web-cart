<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SummaryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [ProductController::class, 'index'])->middleware('auth');

Route::get('/login', [UserController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [UserController::class, 'logincheck'])->middleware('guest');

Route::get('/signup', [UserController::class, 'signupview'])->middleware('guest');
Route::post('/signup', [UserController::class, 'signup'])->middleware('guest');

Route::get('/logout', [UserController::class, 'logout'])->middleware('auth');

Route::get('/cart', [CartController::class, 'index'])->middleware('auth');
Route::post('/cart', [CartController::class, 'addtocart'])->middleware('auth');
Route::get('/delete-cart/{id}', [CartController::class, 'deleteproduct'])->middleware('auth');

Route::get('/summary', [SummaryController::class, 'index'])->middleware('auth');
