<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Set;
use Auth;
use App\Card;
use App\Collection;

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

    return view('sets.show', [
      'collection' => $collection, 
      'set' => $set,
      'cards' => $cards,
    ]);
  }
}
