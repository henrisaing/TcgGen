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

  public function showSet(Collection $collection, Set $set){
    $cards = $set->cards()->get();
    $template = $set->template();
    $auth = AuthCheck::collectPerms($collection);

    return view('sets.show', [
      'auth' => $auth,
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


  public function editSet(Set $set){
    $collection = $set->collection()->first();

    if(AuthCheck::collectPerms($collection)['owner']):
      // $set->updateSet($request);
      $view = view('sets.edit', [
        'set' => $set,
      ]);
    else:
      $view = 'no permission to edit set.';
    endif;


    return $view;
  }


  public function updateSet(Set $set, Request $request){
    $collection = $set->collection()->first();

    if(AuthCheck::collectPerms($collection)['owner']):
      $set->updateSet($request);
      $view = redirect('/collection/'.$collection->id);
    else:
      $view = 'no permission to edit set.';
    endif;

    return $view;
  }
}
