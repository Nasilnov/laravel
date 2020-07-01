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

//Route::get('/', function () {
//    return view('home');
//});

Route::get('/', [
    'uses' => 'HomeController@index',
    'as' => 'home'
]);

Route::get('/aut', [
    'uses' => 'AuthController@auth',
    'as' => 'aut'
]);

Route::group(['prefix' => 'news'], function () {
    Route::get('/', [
        'uses' => 'NewsController@category',
        'as' => 'news'
    ]);

    Route::get('/category/{id}', [
        'uses' => 'NewsController@categoryId',
        'as' => 'categoryId'
    ])->where('id', '\d+');

    Route::get('/{id}', [
        'uses' =>  'NewsController@newsId',
        'as' => 'newsId'
    ])->where('id', '\d+');

    Route::get('/category/{id}/add', [
        'uses' => 'NewsController@newsAdd',
        'as' => 'newsAdd'
    ])->where('id', '\d+');
});
