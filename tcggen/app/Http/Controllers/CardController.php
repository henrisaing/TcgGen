<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Card;
use App\Set;
use Auth;

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
      
    return redirect('/collection/'.$set->collection()->get()[0]->id.'/set/'.$set->id);
  }
}
