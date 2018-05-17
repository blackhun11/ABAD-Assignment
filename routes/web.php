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


Route::get('/testregister', function () {
    return view('mainView.register3');
});

// Route::get('/test', function () {
//     return view('mainView.projectTimeline');
// });

// Route::get('/test', 'Test@index');
// Route::post('/store', 'Test@store');
// Route::get('/show', 'Test@show');

Route::get('/createProject', 'ProjectController@index');
Route::post('/createProject', 'ProjectController@store');
Route::get('/projectList', 'ProjectListController@index');
Route::post('/projectList', 'ProjectListController@searchResult');
Route::get('/projectList/{list}/{detail?}', 'ProjectListController@showLvl2');
Route::post('/projectList/{list}/{detail?}', 'ProjectListController@searchResult');
Route::post('ajaxSearch',array('as'=>'searchAjax','uses'=>'ProjectListController@searchProject'));
Route::get('/projectDetail/{projectID}', 'ProjectListController@projectDetail');
Route::post('/projectDetail/{projectID}', 'ProjectListController@saveBiddingTransaction');
Route::post('ajaxSaveBid',array('as'=>'saveBidAjax','uses'=>'ProjectListController@updateIsWinner'));
Route::get('/myProject', 'myProjectController@index');
Route::get('/projectTimeline/{projectID}', 'myProjectController@getProjectTimeline');
Route::post('/projectTimeline/{projectID}', 'myProjectController@updateProjectTimeline');



// Route::get('/test', 'Test@index');
// Route::post('/test', 'Test@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//facebook socialite
Route::get('login/facebook', 'Auth\LoginController@redirectToProvider');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');


