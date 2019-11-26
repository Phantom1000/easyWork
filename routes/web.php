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
Route::get('/', 'ProfileController@index')->name('index');

Auth::routes();

Route::get('/order', 'OrderController@index')->name('order.index');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/profile/{user}/edit', 'ProfileController@edit')->middleware('can:update,user')->name('profile.edit');
    Route::put('/profile/{user}', 'ProfileController@update')->name('profile.update');

    Route::post('/order', 'OrderController@store')->name('order.store');
    Route::get('/order/my', 'OrderController@myOrders')->name('order.my');
    Route::get('/order/create', 'OrderController@create')->name('order.create');
    Route::delete('/order/{order}', 'OrderController@destroy')->middleware('can:update,order')->name('order.destroy');
    Route::put('/order/{order}', 'OrderController@update')->middleware('can:update,order')->name('order.update');
    Route::get('/order/{order}/edit', 'OrderController@edit')->middleware('can:update,order')->name('order.edit');
    Route::post('/order/{order}/finish', 'OrderController@finish')->name('order.finish');
    
    Route::get('/application/{order}/create', 'ApplicationController@create')->name('application.create');
    Route::get('/application', 'ApplicationController@index')->name('application.index');
    Route::post('/application/{application}', 'ApplicationController@accept')->name('application.accept');
    Route::put('/application/{application}', 'ApplicationController@reject')->name('application.reject');
    Route::delete('/application/{application}', 'ApplicationController@destroy')->name('application.destroy');

    Route::get('/comment/{order}/create', 'CommentController@create')->name('comment.create');
    Route::post('/comment/{order}', 'CommentController@store')->name('comment.store');
});
Route::get('/order/{order}', 'OrderController@show')->name('order.show');
Route::get('/profile/{user}', 'ProfileController@show')->name('profile.show');
