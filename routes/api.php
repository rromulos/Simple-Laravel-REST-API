<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('book', 'BooksController@getAll');
Route::get('book/{isbn}', 'BooksController@getBookByISBN');
Route::post('book', 'BooksController@create');
Route::put('book/{id}', 'BooksController@update');
Route::delete('book/{id}', 'BooksController@delete');
