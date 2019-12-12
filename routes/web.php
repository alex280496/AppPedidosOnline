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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin/products','ProductController@index'); //para el listado de productos
Route::get('/admin/products/create','ProductController@create'); //para ver el formulario
Route::post('/admin/products','ProductController@store'); //para registrar datos del formulario

Route::get('/admin/products/{id}/edit','ProductController@edit'); //formualrio de edicion
Route::post('/admin/products/{id}/edit','ProductController@update'); // para actualizar la base de datos

Route::delete('/admin/products/{id}','ProductController@destroy'); //para elimianr datos


// PUT PATCH DELETE