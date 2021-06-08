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
Route::post('/collection/store','CollectionController@store');
Route::delete('/collection/{collection}/delete','CollectionController@delete');
Route::get('/collection/{collection}','CollectionController@show');

// sets routes
Route::get('/sets', 'SetController@index');
Route::get('/collection/{collection}/set/new','SetController@newSet');
Route::post('/collection/{collection}/set/store','SetController@storeSet');
Route::get('/collection/{collection}/set/{set}','SetController@show');
Route::get('/set/{set}/edit','SetController@edit');
Route::post('/set/{set}/update','SetController@update');
Route::delete('/set/{set}/delete','SetController@delete');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// card routes
Route::get('/set/{set}/cards', 'CardController@index');
Route::get('/set/{set}/new', 'CardController@newCard');
Route::post('/set/{set}/store', 'CardController@storeCard');