<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Set;
use Auth;
use App\Card;
use App\Collection;
use App\AuthCheck;

class SetController extends Controller
{
    //
  public function index(){
    return view('sets.index');
  }

  public function newSet(Collection $collection){
    return view('sets.new',['collection'=>$collection]);
  }

  public function storeSet(Collection $collection,Request $request){
    $set = new Set();
    $set->createSet($collection, $request);

      return redirect('/collection/'.$collection->id);
  }

  public function show(Collection $collection, Set $set){
    $cards = $set->cards()->get();
    $template = $set->template();

    return view('sets.show', [
      'collection' => $collection, 
      'set' => $set,
      'cards' => $cards,
      'template' => $template,
    ]);
  }

  public function deleteSetForm(Set $set){
    $collection = $set->collection()->first();

    if(AuthCheck::collectPerms($collection)['owner']):
      $view = view('sets.delete', ['set'=>$set]);
    else:
      $view = 'permission denied';
    endif;
    
    return $view;
  }


  public function deleteSet(Set $set){
    $collection = $set->collection()->first();

    if(AuthCheck::collectPerms($collection)['owner']):
      $set->delete();
    endif;

    $view = redirect('/collection/'.$collection->id);

    return $view;
  }
}
