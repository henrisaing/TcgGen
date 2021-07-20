<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Collection;
use App\DeckcardController;
use App\AuthCheck;
use Auth;
use App\Deck;

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
          'deckcards' => $deck->deckcards()->get(),
          'collection' => $deck->collection()->first(),
        ]);
    else:
      $msg = "You do not have permission to view this deck.";
      $view = view('errors.error', ['errorMsg' => $msg]);
    endif;

    return $view;
  }

  public function activateDeck(Deck $deck){
    
    return $view;
  }
}
