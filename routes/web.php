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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::resource('books', 'App\Http\Controllers\BookController');
Route::resource('users', 'App\Http\Controllers\Auth\RegisteredUserController');
Route::get('users/edit/{id}', 'App\Http\Controllers\Auth\RegisteredUserController@edit');
Route::resource('my-collections', 'App\Http\Controllers\CollectionController');
Route::post('my-collections/create', 'App\Http\Controllers\CollectionController@create');
Route::post('my-collections/{id}','App\Http\Controllers\CollectionController@show');
Route::get('books/add-in-collection/{_id}', 'App\Http\Controllers\BookController@addInCollection');
Route::get('book/{id}', 'App\Http\Controllers\BookController@displayBook');
Route::get('book/search', 'App\Http\Controllers\BookController@searchBook');
