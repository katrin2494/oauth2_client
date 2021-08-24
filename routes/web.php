<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login','App\Http\Controllers\AuthController@redirectToProvider')->name('login');
Route::middleware('auth')->get('/logout',function (){
	\Illuminate\Support\Facades\Auth::logout();
	return redirect('/');
});
Route::get('callback', 'App\Http\Controllers\AuthController@handleProviderCallback');
Route::middleware('auth')->get('profile', 'App\Http\Controllers\AuthController@profile');
