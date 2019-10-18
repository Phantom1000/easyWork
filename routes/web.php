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

Route::get('/profile/{user}/edit', 'ProfileController@edit')->middleware('auth', 'can:update,user')->name('profile.edit');

Route::put('/profile/{user}', 'ProfileController@update')->middleware('auth')->name('profile.update');

Route::resource('order', 'OrderController')->middleware('auth');

Route::get('test/{check}', function($check) {
    return view('test', [
        'check' => $check
    ]);
})->name('test');
