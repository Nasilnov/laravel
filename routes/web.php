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
    return view('home');
});

Route::get('/aut', 'AuthController@auth');

Route::group(['prefix' => 'news'], function () {
    Route::get('/category', 'NewsController@category');
    Route::get('/category/{id}', 'NewsController@categoryId')->where('id', '\d+');
    Route::get('/{id}', 'NewsController@newsId')->where('id', '\d+');
    Route::get('/add', 'NewsController@newsAdd');
});
