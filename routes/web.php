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
    Route::get('/categories/{id}/edit', 'CategoryController@edit');
    Route::put('/categories/{category}/update', 'CategoryController@update');
    Route::get('/categories/{id}/destroy', 'CategoryController@destroy');

    Route::get('/news', 'NewsController@index');
    Route::get('/news/create', 'NewsController@create');
    Route::post('/news/store', 'NewsController@store');
    Route::get('/news/{id}/edit', 'NewsController@edit');
    Route::put('/news/{singleNews}/update', 'NewsController@update');
    Route::get('/news/{id}/destroy', 'NewsController@destroy');
});

Route::get('/categories/{id}/show', 'CategoryController@show');
Route::get('/news/{id}', 'NewsController@show');
