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
    return view('navbar');
});

Auth::routes();

////////////// default
Route::get('/home', 'HomeController@index')->name('home');

/////////// Accounts
Route::get('/edit', 'AccountController@edit')->name('toto');
Route::post('/update', 'AccountController@update')->name('update');

////////////// projects
route::get('/projects', 'ProjectController@index');
route::get('/projects/create', 'ProjectController@create');
route::post('/projects', 'ProjectController@store');
route::get('/projects/{id}/edit', 'ProjectController@show');
route::get('/projects/{id}/edit', 'ProjectController@edit');
route::put('/projects/{id}', 'ProjectController@update');
route::delete('/projects/{id}', 'ProjectController@delete');

