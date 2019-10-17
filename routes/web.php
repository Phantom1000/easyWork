<?php

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
    return view('index');
})->name('index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile/{user}', 'ProfileController@index')->name('profile');

Route::get('/profile/{user}/edit', 'ProfileController@edit')->middleware('auth')->name('profile.edit');

Route::put('/profile/{user}', 'ProfileController@update')->middleware('auth')->name('profile.update');