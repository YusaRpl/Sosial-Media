<?php

use App\Http\Controllers\FollowingControllsr;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostControllers;
use App\Http\Controllers\RegisterControllser;
use App\Http\Controllers\PostingController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function(){

Route::get('/',[PostControllers::class, 'index']);
Route::get('/trending/{user:username}',[PostControllers::class, 'index']);
Route::get('/setting/{user:username}',[PostControllers::class, 'setting']);
Route::get('profile/{user:username}/follows', [PostControllers::class, 'follows'])->name('profile.follows');
// Route::get('profile/{user:username}/following', [FollowingControllsr::class, 'index'])->name('profile.index');
Route::post('profile/{user:username}', [FollowingControllsr::class, 'store'])->name('following.store');
Route::post('profile/{user:username}/delete', [FollowingControllsr::class, 'storeHapus'])->name('following.storeHapus');




Route::get('/chat/{user:username}', [PostControllers::class, 'chat']);
Route::resource('/posting', PostingController::class);





// Route::get('profile/{user}/following', [FollowingControllsr::class, 'following'])->name('profile.following');
// Route::get('profile/{user}/followers', [FollowingControllsr::class, 'follower'])->name('profile.follower');

});





Route::get('/form-register', [RegisterControllser::class, 'create']);
Route::post('/form-register', [RegisterControllser::class, 'store']);

Route::get('/form-login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/form-login',[LoginController::class, 'authenticate']);
Route::post('/logout',[loginController::class, 'logout']);

