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

/****Authentication routes******/
//Format:
//Route::get/post/any('URL', 'uses'=>'Controllername@methodname', 'as'=>'routename')

Route::get('auth/login', 'Auth\UserController@getLogin');
Route::post('auth/login', 'Auth\UserController@authenticate');
Route::get('auth/logout', 'Auth\UserController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\UserController@getRegister');
Route::post('auth/register', 'Auth\UserController@store');

Route::get('/logout', 'Auth\UserController@logout');





/**** Pages routes ****/

Route::get('/', 'HomeController@index');

//Route::get('/buy', ['uses' => 'HomeController@buy', 'as' => 'buyitem',]);

//Route::post('/buy', ['uses' => 'HomeController@postitem', 'as' => 'buyitem',] );

//Route::get('/pay/{id}/proceed', ['uses' => 'HomeController@getPay', 'as' => 'payitem',] );




//Format:
//Route::get/post/any('URL', 'uses'=>'Controllername@methodname', 'as'=>'routename')

Route::get('/add', ['uses' => 'HomeController@getTask', 'as' => 'addtask',] );

Route::post('/add', ['uses' => 'HomeController@postTask', 'as' => 'addtask',] );


Route::get('/task/{id}/delete', ['uses' => 'HomeController@delete', 'as' => 'delete',] );

Route::get('/task/{id}/edit', ['uses'=> 'HomeController@getEdit', 'as' => 'edittask',]);

Route::post('/task/{id}/edit', ['uses'=> 'HomeController@postEdit', 'as' => 'edittask',]);

Route::get('/tasks', ['uses' => 'HomeController@tasks', 'as' => 'tasks',] );

Route::get('/log-out', ['uses' => 'HomeController@logout', 'as' => 'logout',] );

Route::get('password/reset',['uses'=>'PasswordController@getEmail', 'as' =>'resetpassword']);

Route::get('chat',['uses'=>'HomeController@getChat', 'as' =>'chat']);



//Route::get('/chat',['uses'=>'HomeController@getchat', 'as'=>'chat']);







//Route::get('/', function () {
  //  return view('welcome');
//});



//Named route

//Route::get('user/profile', ['as'=>'profile','uses'=>'UserController@profile']);

// Or
//Route::get('user/profile','UserController@profile')->name('profile')




/***********************Admin Routes***************************/

//Route::get(['prefix'=>'admin', 'middleware'=>'admin'], function(){

# Users
//Route::get('admin/dashboard', ['as'=>'dashboard', 'uses'=>'AdminController@dashboard'])



//})