<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'MainController@index');
Route::get('/home', 'MainController@index');



Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin', 'AdminController@index');

    Route::get('/categories', 'CategoryController@index');
    Route::get('/categories/create', 'CategoryController@create');
    Route::post('/categories/store', 'CategoryController@store');
    Route::get('/categories/{category}/edit', 'CategoryController@edit');
    Route::put('/categories/{category}/update', 'CategoryController@update');
    Route::get('/categories/{category}/destroy', 'CategoryController@destroy');

    Route::get('/news', 'NewsController@index');
    Route::get('/news/create', 'NewsController@create');
    Route::post('/news/store', 'NewsController@store');
    Route::get('/news/{news}/edit', 'NewsController@edit');
    Route::put('/news/{news}/update', 'NewsController@update');
    Route::get('/news/{news}/destroy', 'NewsController@destroy');
});

Route::get('/categories/{category}', 'CategoryController@show');
Route::get('/news/{news}', 'NewsController@show');
