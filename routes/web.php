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

// getRequest
Route::get('/', 'BlogController@index')->name('index');
Route::get('/nuevo', 'BlogController@create')->name('create');
Route::get('/editar/{id}', 'BlogController@edit')->name('edit');
Route::get('/eliminar/{id}', 'BlogController@destroy')->name('destroy');

// postRequest
Route::post('/guardar', 'BlogController@store')->name('store');
Route::post('/actualizar', 'BlogController@update')->name('update');



