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

Route::group(['middleware' => ['auth:admin']], function() {
    Route::get('/books/create', 'BooksController@create');
    Route::post('/books/store', 'BooksController@store');
    Route::get('/books/edit/{id}', 'BooksController@edit');
    Route::put('/books/update', 'BooksController@update');
    Route::delete('/books/delete/{id}', 'BooksController@delete');

    Route::get('/authors/create', 'AuthorsController@create');
    Route::post('/authors/store', 'AuthorsController@store');
    Route::get('/authors/edit/{id}', 'AuthorsController@edit');
    Route::put('/authors/update', 'AuthorsController@update');
    Route::delete('/authors/delete/{id}', 'AuthorsController@delete');

    Route::get('/publishers/create', 'PublishersController@create');
    Route::post('/publishers/store', 'PublishersController@store');
    Route::get('/publishers/edit/{id}', 'PublishersController@edit');
    Route::put('/publishers/update', 'PublishersController@update');
    Route::delete('/publishers/delete/{id}', 'PublishersController@delete');

    Route::get('/users', 'UsersController@index');
    Route::get('/users/create', 'UsersController@create');
    Route::post('/users/store', 'UsersController@store');
    Route::get('/users/edit/{id}', 'UsersController@edit');
    Route::put('/users/update', 'UsersController@update');
    Route::delete('/users/delete/{id}', 'UsersController@delete');
    Route::get('/users/{id}', 'UsersController@show');

    Route::get('/borrowings', 'BorrowingsController@index');
    Route::get('/borrowings/create', 'BorrowingsController@create');

    Route::get('/borrowings/edit/{id}', 'BorrowingsController@edit');
    Route::put('/borrowings/update', 'BorrowingsController@update');
    Route::delete('/borrowings/delete/{id}', 'BorrowingsController@delete');
    Route::get('/borrowings/{id}', 'BorrowingsController@show');
});

Route::group(['middleware' => ['auth:user,admin'] ], function() {
    Route::post('/borrowings/store', 'BorrowingsController@store');

    Route::get('/notifications/admin', 'NotificationsController@showAll');
    Route::get('/notifications/user', 'NotificationsController@showAll');
});

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


Route::get('/books', 'BooksController@index');
Route::get('/books/{id}', 'BooksController@show');

Route::get('/authors', 'AuthorsController@index');
Route::get('/authors/{id}', 'AuthorsController@show');

Route::get('/publishers', 'PublishersController@index');
Route::get('/publishers/{id}', 'PublishersController@show');
