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

Route::get('/home', 'Front\HomeController@index');

Route::get('/about',function(){
    return view('static.about');
});

Route::group(['prefix'=>'admin','middleware'=>'admin'],function(){
    Route::get('/','Admin\DashboardController@index');

    //前台相关设置
    Route::get('/frontsetting','Admin\FrontsettingController@index');

    //设置
    Route::get('/setting','Admin\SettingController@index');
    Route::post('/setting/image','Admin\SettingController@image');
    Route::post('/setting/save','Admin\SettingController@save');

    //用户相关
    Route::get('/user','Admin\UserController@index');

    //题库菜单
    Route::get('/questions','Admin\Questions\LanguageController@index');
    Route::get('/questions/language','Admin\Questions\LanguageController@index');
    Route::get('/questions/language/create','Admin\Questions\LanguageController@create');
    Route::get('/questions/language/edit/{id}','Admin\Questions\LanguageController@edit');
    Route::post('/questions/language/save','Admin\Questions\LanguageController@save');
    Route::get('/questions/language/delete/{id}','Admin\Questions\LanguageController@delete');
    //题库
    Route::get('/questions/questions','Admin\Questions\QuestionsController@index');
    Route::get('/questions/questions/create','Admin\Questions\QuestionsController@create');
    Route::get('/questions/questions/edit/{id}','Admin\Questions\QuestionsController@edit');
    Route::post('/questions/questions/save','Admin\Questions\QuestionsController@save');
    Route::get('/questions/questions/type-{type_id}','Admin\Questions\QuestionsController@type_list');
//    Route::get('/questions/questions/questions-{id}','Admin\Questions\QuestionsController@question');

    //文章
    Route::get('/content','Admin\ContentController@index');
    Route::get('/content/page/{page}','Admin\ContentController@index');
    Route::get('/content/create','Admin\ContentController@create');
    Route::post('/content/save','Admin\ContentController@save');
    Route::get('/content/delete/{id}','Admin\ContentController@delete');
    Route::get('/content/edit/{id}','Admin\ContentController@edit');

    //
    Route::get('/dashboard','Admin\DashboardController@index');
    Route::get('/login','Admin\PassportController@index');
});











