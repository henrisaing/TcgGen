<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection as CollectionObj;
use App\Collection;
use App\Deckcard;
use App\AuthCheck;
use Auth;
use App\Deck;
use App\Card;

class DeckController extends Controller
{
    //
  public function decks(Collection $collection){
    $decks = $collection->getDecks();

    $view = 'test';
    return $view;
  }

  public function newDeck(Collection $collection){
    $auth = AuthCheck::collectPerms($collection);
    if (Auth::check()):
      $view = view('decks.new', [
        'auth' => $auth,  
        'collection' => $collection,
      ]);
    else:
      $msg = "You must be logged in to create a deck.";
      $view = view('errors.error', ['errorMsg' => $msg]);
    endif;
    

    return $view;
  }

  public function storeDeck(Collection $collection, Request $request){

    if (Auth::check()):
      $deck = $collection->createDeck($collection, $request);
      $view = redirect('/collection/'.$collection->id);
      $deck->activate();
    else:
      $msg = "You must be logged in to create a deck.";
      $view = view('errors.error', ['errorMsg' => $msg]);
    endif;

    return $view;
  }

  public function showDeck(Deck $deck){
    if($deck->user_id == Auth::id() || $deck->public == 'public' || $deck->public == 'shareable'):
      $view = view('decks.show',[
          'deck' => $deck,
          'deckcards' => $deck->deckcards()->orderBy('card_id')->get(),
          'collection' => $deck->collection()->first(),
        ]);
    else:
      $msg = "You do not have permission to view this deck.";
      $view = view('errors.error', ['errorMsg' => $msg]);
    endif;

    return $view;
  }

  public function activateDeck(Deck $deck){
    $collection = $deck->collection()->first();
    $deck->activate();
  }

  public function deleteDeckForm(Deck $deck){
    if ($deck->user_id == Auth::id()):
      $view = view('decks.delete',[
          'deck' => $deck,
        ]);
    else:
      $view = "You do not have permission to delete this deck.";
    endif;
    return $view; 
  }

  public function deleteDeck(Deck $deck){
    $collection = $deck->collection()->first();

    if ($deck->user_id == Auth::id()):
      $deck->delete();
    endif;

    $view = redirect('/collection/'.$collection->id);

    return $view;
  }

  public function editDeck(Deck $deck){
    $collection = $deck->collection()->first();
    $auth = AuthCheck::collectPerms($collection);

    if($deck->user_id == Auth::id()):
      $view = view('decks.edit', [
        'deck' => $deck,
        'auth' => $auth,
      ]);
    else:
      $view = "You do not have permission to edit this deck.";
    endif;

    return $view;
  }

  public function updateDeck(Deck $deck, Request $request){
    $collection = $deck->collection()->first();
    $auth = AuthCheck::collectPerms($collection);
    $public = $request->public;
    
    if ($auth['owner']):
      $public = $request->public;
    elseif($auth['owner'] == false && $public == 'public'):
      $public = 'private';
    endif;

    if($deck->user_id == Auth::id()):
      $view = redirect('/collection/'.$collection->id);
      $deck->update([
          'name' => $request->name,
          'description' => $request->description,
          'public' => $public,
        ]);
    else:
      $msg = "You do not have permission to edit this deck.";
      $view = view('errors.error', ['errorMsg' => $msg]);
    endif;

    return $view;
  }

  // deckcard functions
  public function addCard(Deck $deck, Card $card){
    if($deck->user_id == Auth::id()):
      $deck->deckcards()->create([
        'card_id' => $card->id,
        'order' => 1,
      ]);
    endif;

    return $deck->deckcards()->get()->count();
  }

  public function removeCard(Deck $deck, Deckcard $deckcard){
    if($deck->user_id == Auth::id()):
      $deckcard->delete();
    endif;

    return $deck->deckcards()->get()->count();
  }

}
