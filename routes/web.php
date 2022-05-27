<?php

use App\Http\Controllers\commentControllers;
use App\Http\Controllers\commentControllser;
use App\Http\Controllers\FollowingControllsr;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostControllers;
use App\Http\Controllers\RegisterControllser;
use App\Http\Controllers\PostingController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function(){

Route::get('/',[PostControllers::class, 'pertama']);
Route::get('/trending/{user:username}',[PostControllers::class, 'index']);
Route::get('/setting/{user:username}',[PostControllers::class, 'setting']);
Route::get('profile/{user:username}/follows', [PostControllers::class, 'follows'])->name('profile.follows');
Route::post('profile/{user:username}', [FollowingControllsr::class, 'store'])->name('following.store');
Route::post('profile/{user:username}/delete', [FollowingControllsr::class, 'storeHapus'])->name('following.storeHapus');

Route::post('/like', [LikeController::class, 'store'])->name('like.add');
Route::post('/comment', [commentControllser::class, 'store'])->name('comment.add');

Route::get('/chat/{user:username}', [PostControllers::class, 'chat']);
Route::resource('/posting', PostingController::class);

});
Route::get('/form-register', [RegisterControllser::class, 'create']);
Route::post('/form-register', [RegisterControllser::class, 'store']);

Route::get('/form-login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/form-login',[LoginController::class, 'authenticate']);
Route::post('/logout',[loginController::class, 'logout']);