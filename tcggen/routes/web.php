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
Route::get('/collection/{collection}/edit','CollectionController@editCollection');
Route::post('/collection/{collection}/update','CollectionController@updateCollection');
Route::get('/collection/new','CollectionController@new');
Route::post('/collection/store','CollectionController@store');
Route::delete('/collection/{collection}/delete','CollectionController@deleteCollection');
Route::get('/collection/{collection}/delete','CollectionController@deleteCollectionForm');
Route::get('/collection/{collection}','CollectionController@show');

// sets routes
Route::get('/collection/{collection}/sets', 'SetController@index');
Route::get('/collection/{collection}/set/new','SetController@newSet');
Route::post('/collection/{collection}/set/store','SetController@storeSet');
Route::get('/collection/{collection}/set/{set}','SetController@showSet');
Route::get('/set/{set}/edit','SetController@editSet');
Route::post('/set/{set}/update','SetController@updateSet');
Route::delete('/set/{set}/delete','SetController@deleteSet');
Route::get('/set/{set}/delete', 'SetController@deleteSetForm');

// auth routes
Auth::routes();

// home route
Route::get('/home', 'HomeController@index')->name('home');

// card routes
Route::get('/set/{set}/cards', 'CardController@index');
Route::get('/set/{set}/new', 'CardController@newCard');
Route::post('/set/{set}/store', 'CardController@storeCard');
Route::get('/card/{card}', 'CardController@showCard');
Route::get('/card/{card}/edit', 'CardController@editCard');
Route::post('/card/{card}/update', 'CardController@updateCard');
Route::delete('/card/{card}/delete', 'CardController@deleteCard');
Route::get('/card/{card}/delete', 'CardController@deleteCardForm');
Route::post('/card/{card}/applyall', 'CardController@applyToAllCards');

// deck routes
Route::get('/collection/{collection}/decks', 'DeckController@decks');
Route::get('/collection/{collection}/deck/new', 'DeckController@newDeck');
Route::post('/collection/{collection}/deck/store', 'DeckController@storeDeck');
Route::post('/deck/{deck}/add', 'DeckController@addCard');
Route::post('/deck/{deck}/remove', 'DeckController@removeCard');
Route::get('/deck/{deck}', 'DeckController@showDeck');
Route::post('/deck/{deck}/activate', 'DeckController@activateDeck');
Route::delete('/deck/{deck}/delete', 'DeckController@deleteDeck');
Route::get('/deck/{deck}/delete', 'DeckController@deleteDeckForm');

// session handling
Route::post('/session', 'SessionController@theme');