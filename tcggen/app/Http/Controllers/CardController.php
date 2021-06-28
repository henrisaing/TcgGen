<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Card;
use App\Set;
use App\Collection;
use Auth;
use App\AuthCheck;

class CardController extends Controller
{
    //not used yet, set/show displays all cards in set
  public function index(){
    return view('cards.index');
  }

  public function newCard(Set $set){
    $collection = $set->collection()->first();

    if (AuthCheck::collectPerms($collection)['owner']) :
      $template = $set->template();
      $view = view('cards.new-vertical', [
        'set' => $set,
        'template' => $template,
        'collection' => $set->collection()->first(),
      ]);
    else:
      $view = "You do not have permission to make a new card.";
    endif;

    return $view;
  }

  public function storeCard(Set $set, Request $request){
    $collection = $set->collection()->first();

    if (AuthCheck::collectPerms($collection)['owner']) :
      $card = new Card();
      $card->createCard($set, $request);
      $view = redirect('/collection/'.$set->collection()->first()->id.'/set/'.$set->id);
    else:
      $view = "You do not have permission to make a new card.";
    endif;

    return $view;
  }

  public function showCard(Card $card){
    $collection = $card->set()->first()->collection()->first();
    $auth = AuthCheck::collectPerms($collection);
    
    if($auth['owner'] || $card->public == 'public' || $card->public == 'shareable'):
      $view = view('cards.show-vertical', [
        'card' => $card,
        'set' => $card->set()->first(),
        'collection' => $collection,
        'auth' => $auth,
      ]);
    else:
      $view = 'You do not have permissions to view this card.';
    endif;

    return $view;
  }

  public function editCard(Card $card){
    $collection = $card->set()->first()->collection()->first();

    if(AuthCheck::collectPerms($collection)['owner']):
      $view = view('cards.edit-vertical', [
        'card'=>$card,
        'set'=>$card->set()->first(),
        'collection'=>$card->set()->first()->collection()->first(),
      ]);
    else:
      $view = redirect('/card/'.$card->id);
    endif;

    return $view;
  }

  public function updateCard(Card $card, Request $request){
    $collection = $card->set()->first()->collection()->first();

    if(AuthCheck::collectPerms($collection)['owner']):
      $card->updateCard($request);
    endif;

    $view = redirect('/card/'.$card->id);

    return $view;
  }

  public function deleteCard(Card $card){
    $set = $card->set()->first();
    $collection = $set->collection()->first();

    if(AuthCheck::collectPerms($collection)['owner']):
      $card->delete();
    endif;

    $view = redirect('/collection/'.$collection->id.'/set/'.$set->id);

    return $view;
  }

  public function deleteCardForm(Card $card){
    $collection = $card->set()->first()->collection()->first();

    if(AuthCheck::collectPerms($collection)['owner']):
      $view = view('cards.delete', ['card'=>$card]);
    else:
      $view = "Sorry, you dont have permission to delete ".$card->name;
    endif;

    return $view;
  }
}
