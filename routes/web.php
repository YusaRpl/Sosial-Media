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
Route::post('profile/{user:username}', [FollowingControllsr::class, 'store'])->name('following.store');
Route::post('profile/{user:username}/delete', [FollowingControllsr::class, 'storeHapus'])->name('following.storeHapus');

Route::get('belajar', [PostControllers::class, 'belajar']);
// // Route::post('postinsert', 'FollowingControllsr@ajaxRequestPost');
// // Route::post('postinsert', [PostingController::class, 'ajaxRequestPost'])->name('@ajaxRequestPost');
// Route::get('postinsert', 'PostingController@ajaxRequest');
// Route::post('postinsert', 'PostingController@ajaxRequestPost');
Route::resource('todo', CrudController::class);


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

