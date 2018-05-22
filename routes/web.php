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
    'uses' => 'ProjectController@index'
]);
/////////////////////////////create
route::get('/projects/create',[
    'as' => 'project.create',
    'uses' => 'ProjectController@createProject'
]);

route::post('/projects/valid',[
    'as' => 'valid.project',
    'uses' => 'ProjectController@valid'
]);
////////////////////////////////////
route::get('/project/{id}',[
    'as' => 'show.project',
    'uses' => 'ProjectController@showProject'
]);

///////////////////////edit
route::get('/project/{id}/edit', [
    'as' => 'edit.project',
    'uses' => 'ProjectController@edit'
]);

route::put('/projects/update', [
    'as' => 'update.project',
    'uses' => 'ProjectController@update'
]);
////////////////////////////
route::delete('/projects/{id}', 'ProjectController@delete');

/////////// others
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
