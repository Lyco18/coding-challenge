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
    return view('pages/welcome');
});

Route::get('/welcome', function () {
    return view('pages/welcome');
});

Route::get('/about', function () {
    return view('pages/about');
});

Route::get('/search', function () {
  return view('pages/search');
});

Route::resource('contacts','App\Http\Controllers\ContactController');
Route::get('/display-all', 'App\Http\Controllers\ContactController@list');
Route::get('/display-search', 'App\Http\Controllers\ContactController@showSearch');


Route::get('/profile', function () {
  return view('pages/profile');
});

Route::get('/login', 'App\Http\Controllers\LoginController@show');
Route::post('/login', 'App\Http\Controllers\LoginController@login');
Route::get('/logout', 'App\Http\Controllers\LoginController@logout');
