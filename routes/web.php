<?php


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'WebController@index');


//Rutas para el CRUD de tareas
Route::group(['middleware' => 'auth'],function(){

	Route::get('project/task','TaskController@index');
	Route::get('project/task/create','TaskController@create');
	Route::post('project/task/create','TaskController@store');
	Route::get('project/task/show/{id}','TaskController@show');
	Route::get('project/task/{id}/edit','TaskController@edit');
	Route::post('project/task/{id}/edit','TaskController@update');
	Route::post('project/task/delete/{id}','TaskController@destroy');
});


//Rutas para el CRUD de proyectos
Route::group(['middleware' => 'auth'],function(){

	Route::get('projects','ProjectController@index');
	Route::get('projects/createProject','ProjectController@create');
	Route::post('projects/createProject','ProjectController@store');
	Route::get('projects/show/{id}','ProjectController@show');
	Route::get('projects/{id}/edit','ProjectController@edit');
	Route::post('projects/{id}/edit','ProjectController@update');
	Route::post('projects/delete/{id}','ProjectController@destroy');
});
