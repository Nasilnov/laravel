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

Route::group(['prefix' => 'user'], function () {

    Route::get('/', [
        'uses' => 'AuthController@userAdd',
        'as' => 'userAdd'
    ]);
    Route::match(['post', 'get'], '/add', [
        'uses' => 'AuthController@saveUser',
        'as' => 'saveUser'
    ]);
    Route::get('/all', [
        'uses' => 'AuthController@allUser',
        'as' => 'allUser'
    ]);
});


Route::group(['prefix' => 'news'], function () {
    Route::get('/', [
        'uses' => 'NewsController@category',
        'as' => 'news'
    ]);
    Route::get('/category/{category}', [
        'uses' => 'NewsController@categoryId',
        'as' => 'categoryId'
    ]);

    Route::get('/{news}', [
        'uses' =>  'NewsController@newsId',
        'as' => 'newsId'
    ])->where('id', '\d+');

    Route::get('/category/{id}/add', [
        'uses' => 'NewsController@newsAdd',
        'as' => 'newsAdd'
    ])->where('id', '\d+');

    Route::get('/{news}/edit', [
        'uses' => 'NewsController@newsEdit',
        'as' => 'newsEdit'
    ]);

    Route::match(['post','get'], '/updateNews', [
        'uses' => 'NewsController@updateNews',
        'as' => 'updateNews'
    ]);
    Route::match(['post','get'], '/saveNews', [
        'uses' => 'NewsController@saveNews',
        'as' => 'saveNews'
    ]);
//
//    Route::match(['post','get'], '/saveUser', [
//        'uses' => 'UserController@saveUser',
//        'as' => 'saveUser'
//    ]);

});
