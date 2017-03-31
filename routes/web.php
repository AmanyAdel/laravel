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
    return view('welcome');
});


Route::group(["middleware" => 'auth'], function() {
	Route::get("/task", "TaskController@index");
	Route::post('/task', "TaskController@postForm");

Route::get("/delete/{id}", 'TaskController@delete');
Route::get("/edit/{id}", 'TaskController@edit');
Route::post("/edit/{id}", 'TaskController@update');
});




Auth::routes();

Route::get('/home', 'HomeController@index');
