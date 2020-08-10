<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/books', 'BooksController@index');
Route::get('/books/create', 'BooksController@create')->middleware('auth:admin');
Route::post('/books/store', 'BooksController@store')->middleware('auth:admin');
Route::get('/books/edit/{id}', 'BooksController@edit')->middleware('auth:admin');
Route::put('/books/update', 'BooksController@update')->middleware('auth:admin');
Route::delete('/books/delete/{id}', 'BooksController@delete')->middleware('auth:admin');
Route::get('/books/{id}', 'BooksController@show');

Route::get('/authors', 'AuthorsController@index');
Route::get('/authors/create', 'AuthorsController@create')->middleware('auth:admin');
Route::post('/authors/store', 'AuthorsController@store')->middleware('auth:admin');
Route::get('/authors/edit/{id}', 'AuthorsController@edit')->middleware('auth:admin');
Route::put('/authors/update', 'AuthorsController@update')->middleware('auth:admin');
Route::delete('/authors/delete/{id}', 'AuthorsController@delete')->middleware('auth:admin');
Route::get('/authors/{id}', 'AuthorsController@show');

Route::get('/publishers', 'PublishersController@index');
Route::get('/publishers/create', 'PublishersController@create')->middleware('auth:admin');
Route::post('/publishers/store', 'PublishersController@store')->middleware('auth:admin');
Route::get('/publishers/edit/{id}', 'PublishersController@edit')->middleware('auth:admin');
Route::put('/publishers/update', 'PublishersController@update')->middleware('auth:admin');
Route::delete('/publishers/delete/{id}', 'PublishersController@delete')->middleware('auth:admin');
Route::get('/publishers/{id}', 'PublishersController@show');

Route::get('/users', 'UsersController@index')->middleware('auth:admin');
Route::get('/users/create', 'UsersController@create')->middleware('auth:admin');
Route::post('/users/store', 'UsersController@store')->middleware('auth:admin');
Route::get('/users/edit/{id}', 'UsersController@edit')->middleware('auth:admin');
Route::put('/users/update', 'UsersController@update')->middleware('auth:admin');
Route::delete('/users/delete/{id}', 'UsersController@delete')->middleware('auth:admin');
Route::get('/users/{id}', 'UsersController@show')->middleware('auth:admin');

Route::get('/borrowings', 'BorrowingsController@index')->middleware('auth:admin');
Route::get('/borrowings/create', 'BorrowingsController@create')->middleware('auth:admin');
Route::post('/borrowings/store', 'BorrowingsController@store')->middleware('auth:user', 'auth:admin');
Route::get('/borrowings/edit/{id}', 'BorrowingsController@edit')->middleware('auth:admin');
Route::put('/borrowings/update', 'BorrowingsController@update')->middleware('auth:admin');
Route::delete('/borrowings/delete/{id}', 'BorrowingsController@delete')->middleware('auth:admin');
Route::get('/borrowings/{id}', 'BorrowingsController@show')->middleware('auth:admin');

Auth::routes();

Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm')->name('admin.login');
Route::get('/login/user', 'Auth\LoginController@showUserLoginForm')->name('user.login');
Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm')->name('admin.register');
Route::get('/register/user', 'Auth\RegisterController@showUserRegisterForm')->name('user.register');

Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::post('/login/user', 'Auth\LoginController@userLogin');
Route::post('/register/admin', 'Auth\RegisterController@createAdmin');
Route::post('/register/user', 'Auth\RegisterController@createUser');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');


