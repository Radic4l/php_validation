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

Auth::routes();

////////////// default
Route::get('/home', 'HomeController@index');

/////////// Accounts
Route::get('/edit', 'AccountController@edit')->name('toto');
Route::post('/update', 'AccountController@update')->name('update');

////////////// projects
route::get('/projects', [
    'as' => 'index.project',
    'uses' => 'ProjectController@index',

]);
/////////////////////////////create
route::get('/projects/create',[
    'as' => 'project.create',
    'uses' => 'ProjectController@createProject',
    'middleware' => 'auth'
]);

route::post('/projects/valid',[
    'as' => 'valid.project',
    'uses' => 'ProjectController@valid',
    'middleware' => 'auth'
]);
////////////////////////////////////
route::get('/project/{id}',[
    'as' => 'show.project',
    'uses' => 'ProjectController@showProject'
]);

///////////////////////edit
route::get('/project/{id}/edit', [
    'as' => 'edit.project',
    'uses' => 'ProjectController@edit',
    'middleware' => 'auth'
]);

route::post('/projects/update/{id}', [
    'as' => 'update.project',
    'uses' => 'ProjectController@update'
]);
////////////////////////////
route::delete('/delete/{id}', [
    'as' => 'delete.project',
    'uses' => 'ProjectController@destroy'
]);

/////////// others
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');



