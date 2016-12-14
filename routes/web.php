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

	Route::get('projects/show/{id}/tasks','TaskController@index');
	Route::get('projects/show/{id}/tasks/create','TaskController@create');
	Route::post('projects/show/{id}/tasks/create','TaskController@store');
	Route::get('projects/show/{id}/tasks/show/{idTask}','TaskController@show');
	Route::get('projects/show/{id}/tasks/{idTask}/edit','TaskController@edit');
	Route::post('projects/show/{id}/tasks/{idTask}/edit','TaskController@update');
	Route::post('projects/show/{id}/tasks/delete/{idTask}','TaskController@destroy');
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


 //Rutas para los comentarios
 Route::group(['middleware' => 'auth'],function(){

// 	Route::get('projects/show/{id}/tasks','CommentController@index');
//	Route::get('projects/show/{id}/tasks','CommentController@create');
 	Route::post('projects/show/{id}/tasks','CommentController@store');
 });
