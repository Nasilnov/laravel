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

Route::group(['middleware' => 'auth'], function()
{
    Route::get('/logout', function () {
        Auth::logout();
        return redirect('/');
    });

    Route::get('/account', 'Account\IndexController@index')->name('account');

    Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
        Route::get('/admin', 'Admin\IndexController@index')->name('admin');
        Route::resource('/news', Admin\NewsController::class);
        Route::resource('/category', Admin\CategoryController::class);
        Route::resource('/user', Admin\UserController::class);
        Route::get('/parser','Admin\ParserController@index')->name('parser');
    });

});

Route::group(['prefix' => 'user'], function () {
    Route::put('/save', 'UserController@save')->name( 'user.save');
});



Route::group(['prefix' => 'news'], function () {
    Route::get('/', 'NewsController@category')->name('news');

    Route::get('/category/{category}', 'NewsController@categoryId')->name( 'categoryId');

    Route::get('/{news}', 'NewsController@newsId')->name( 'newsId');
});

Route::group(['middleware' => 'guest'], function () {
   Route::get('/auth/vk', 'LoginController@loginVk')->name('loginVk');
   Route::get('/auth/vk/response', 'LoginController@responseVk')->name('responseVk');
    Route::get('/auth/fb', 'LoginController@loginFb')->name('loginFb');
    Route::get('/auth/fb/response', 'LoginController@responseFb')->name('responseFb');
});

Auth::routes();
