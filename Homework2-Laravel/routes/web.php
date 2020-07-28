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

Route::get('/', 'BooksController@index');

Route::get('/create', 'BooksController@create');

Route::post('/store', 'BooksController@store');

Route::get('/edit', 'BooksController@edit');

Route::post('/update', 'BooksController@update');

Route::get('/delete', 'BooksController@delete');
