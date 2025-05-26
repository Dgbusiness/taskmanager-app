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

Route::get('/', 'projectController@index');
Route::get('task/create{id}', 'taskController@create')->name('creation');
Route::resource('task', 'taskController', ['except' => ['create']]);
Route::resource('projects', 'projectController');
Route::post('task/update-order','taskController@updateOrder'); 
