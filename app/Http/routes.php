<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return redirect('/home');
});

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');


Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/about',function(){
    return view('static.about');
});

Route::group(['prefix'=>'admin','middleware'=>'admin'],function(){
    Route::get('/','Admin\DashboardController@index');

    //设置
    Route::get('/setting','Admin\SettingController@index');
    Route::post('/setting/image','Admin\SettingController@image');
    Route::post('/setting/save','Admin\SettingController@save');

    Route::get('/user','Admin\UserController@index');

    //文章
    Route::get('/content','Admin\ContentController@index');
    Route::get('/content/page/{page}','Admin\ContentController@index');
    Route::get('/content/create','Admin\ContentController@create');
    Route::post('/content/save','Admin\ContentController@save');
    Route::get('/content/delete/{id}','Admin\ContentController@delete');
    Route::get('/content/edit/{id}','Admin\ContentController@edit');

    Route::get('/dashboard','Admin\DashboardController@index');
    Route::get('/login','Admin\PassportController@index');
});











