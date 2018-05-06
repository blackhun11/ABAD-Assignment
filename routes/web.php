<?php

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
    return view('mainView.newHome');
});

Route::get('/testregister', function () {
    return view('mainView.register3');
});

// Route::get('/test', function () {
//     return view('mainLayout.txtAreaAuto');
// });

// Route::get('/test', 'Test@index');
// Route::post('/store', 'Test@store');
// Route::get('/show', 'Test@show');

Route::get('/createProject', 'ProjectController@index');
Route::post('/createProject', 'ProjectController@store');
Route::get('/projectList', 'ProjectListController@index');
Route::get('/projectList/{list}/{detail?}', 'ProjectListController@showLvl2');
Route::post('test-ajax',array('as'=>'searchAjax','uses'=>'ProjectListController@searchProject'));

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

//facebook socialite
Route::get('login/facebook', 'Auth\LoginController@redirectToProvider');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');


