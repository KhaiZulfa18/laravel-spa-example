<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::resource('posts', 'PostController');

Route::get('/posts', 'PostController@index')->name('post.index');
Route::post('/posts', 'PostController@store')->name('post.store');
Route::get('/posts/{id}', 'PostController@show')->name('post.show');
Route::get('/posts/{id}/edit', 'PostController@edit')->name('post.edit');
Route::put('/posts/{id}', 'PostController@update')->name('post.update');
Route::delete('/posts/{id}', 'PostController@destroy')->name('post.destroy');