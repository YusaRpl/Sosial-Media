<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostControllers;
use App\Http\Controllers\RegisterControllser;
use App\Http\Controllers\PostingController;
use Illuminate\Support\Facades\Route;

Route::get('/',[PostControllers::class, 'index'])->middleware('auth');
Route::get('/trending',[PostControllers::class, 'trending']);
Route::get('/setting',[PostControllers::class, 'setting']);
Route::get('/profile',[PostControllers::class, 'profile']);
Route::get('/chat', [PostControllers::class, 'chat']);
Route::resource('/posting', PostingController::class)->middleware('auth');

Route::get('/form-register', [RegisterControllser::class, 'create']);
Route::post('/form-register', [RegisterControllser::class, 'store']);


Route::get('/form-login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/form-login',[LoginController::class, 'authenticate']);
Route::post('/logout',[loginController::class, 'logout']);

