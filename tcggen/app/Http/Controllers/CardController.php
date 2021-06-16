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
    //
  public function index(){
    return view('cards.index');
  }

  public function newCard(Set $set){
    return view('cards.new-vertical', ['set'=>$set]);
  }

  public function storeCard(Set $set, Request $request){
      $card = new Card();
      $card->createCard($set, $request);
      $view = redirect('/collection/'.$set->collection()->first()->id.'/set/'.$set->id);
      
    return $view;
  }

  public function showCard(Card $card){

    $view = view('cards.show-vertical', [
      'card'=>$card,
      'set'=>$card->set()->first(),
      'collection'=>$card->set()->first()->collection()->first(),
    ]);

    return $view;
  }

  public function editCard(Card $card){
    $view = view('cards.edit-vertical', [
      'card'=>$card,
      'set'=>$card->set()->first(),
      'collection'=>$card->set()->first()->collection()->first(),
    ]);
    return $view;
  }

  public function updateCard(Card $card, Request $request){
    $card->update([
        'name' => $request->name,
        'description' => $request->description,
        'public' => $request->public,
        'topleft' => $request->topleft,
        'topright' => $request->topright,
        'topmid' => $request->topmid,
        'botleft' => $request->botleft,
        'botright' => $request->botright,
        'botmid' => $request->botmid,
        'midleft' => $request->midleft,
        'midright' => $request->midright,
        'midcenter' => $request->midcenter,
        'midlower' => $request->midlower,
        'midupper' => $request->midupper,
        'card-pic-upper' => $request['card-pic-upper'],
        'card-pic-full' => $request['card-pic-full'],
        'card-background' => $request['card-background'],
        'card-border' => $request['card-border'],
      ]);

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

    $view = view('cards.delete', ['card'=>$card]);
    return $view;
  }
}
