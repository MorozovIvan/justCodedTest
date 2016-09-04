<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('pages.home');
});

//Categories
Route::group(['prefix' => 'categories'], function () {

    Route::get('/', 'CategoryController@index')->name('categories');

    Route::get('/create', 'CategoryController@create')->name('category_create');

    Route::post('/create', 'CategoryController@store')->name('category_create');

    Route::get('/{category}/edit', 'CategoryController@edit')->name('category_edit');

    Route::put('/{category}/edit', 'CategoryController@update')->name('category_edit');

    Route::delete('/{category}/delete', 'CategoryController@destroy')->name('category_delete');
});

//Products
Route::group(['prefix' => 'products'], function () {

    Route::get('/', 'ProductController@index')->name('products');

    Route::get('/create', 'ProductController@create')->name('product_create');


});

