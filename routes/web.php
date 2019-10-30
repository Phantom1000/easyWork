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

Route::get('/profile/{user}', 'ProfileController@show')->name('profile.show');

Route::get('/profile/{user}/edit', 'ProfileController@edit')->middleware('auth', 'can:update,user')->name('profile.edit');

Route::put('/profile/{user}', 'ProfileController@update')->middleware('auth')->name('profile.update');

Route::resource('/order', 'OrderController', ['except' => ['index', 'show'], 'middleware' => ['auth', 'can:update,order']]);

Route::get('/order', 'OrderController@index')->name('order.index');

Route::get('/order/{order}', 'OrderController@show')->name('order.show');

Route::get('/orders/my', 'OrderController@myOrders')->middleware('auth')->name('order.my');

/*Route::post('/order', 'OrderController@store')->middleware('auth')->name('order.store');*/

//Route::get('/order/create', 'OrderController@create')->middleware('auth')->name('order.create');

/*Route::delete('/order/{order}', 'OrderController@destroy')->middleware('auth', 'can:update,order')->name('order.destroy');

Route::put('/order/{order}', 'OrderController@update')->middleware('auth', 'can:update,order')->name('order.update');

Route::get('/order/{order}/edit', 'OrderController@edit')->middleware('auth', 'can:update,order')->name('order.edit');*/

Route::get('/application/{order}/create', 'ApplicationController@create')->middleware('auth')->name('application.create');

Route::get('/application', 'ApplicationController@index')->middleware('auth')->name('application.index');

Route::put('/application/{application}', 'ApplicationController@accept')->middleware('auth')->name('application.accept');

Route::delete('/application/{application}', 'ApplicationController@destroy')->middleware('auth')->name('application.destroy');

Route::get('test/{check}', function($check) {
    return view('test', [
        'check' => $check
    ]);
})->name('test');
