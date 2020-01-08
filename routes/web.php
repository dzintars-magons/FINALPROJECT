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


Auth::routes();

Route::get('/', 'TodoController@index');
Route::get('/add-todo', 'TodoController@new');
Route::post('/save-todo', 'TodoController@save');
Route::get('/edit-todo/{id}', 'TodoController@edit');
Route::post('/update-todo/{id}', 'TodoController@update');
Route::get('/switch-status/{id}', 'TodoController@switch_status');
Route::get('/delete/{id}', 'TodoController@delete');