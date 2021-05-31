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

// collection routes
Route::get('/collections', 'CollectionController@index');
Route::get('/collection/{collection}/edit','CollectionController@edit');
Route::post('/collection/{collection}/update','CollectionController@update');
Route::get('/collection/new','CollectionController@new');
Route::post('/collection/create','CollectionController@create');
Route::delete('/collection/{collection}/delete','CollectionController@delete');

// sets routes
Route::get('/sets', 'SetController@index');
Route::get('/set/{set}/edit','SetController@edit');
Route::post('/set/{set}/update','SetController@update');
Route::get('/set/new','SetController@new');
Route::post('/set/create','SetController@create');
Route::delete('/set/{set}/delete','SetController@delete');