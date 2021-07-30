<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Collection;
use App\DeckcardController;
use App\AuthCheck;
use Auth;

class Deck extends Model
{
  protected $fillable=[
    'user_id',
    'name',
    'description',
    'public',
    'active',
  ];

  public function deckcards(){
    return $this->hasMany(Deckcard::class);
  }

  public function collection(){
    return $this->belongsTo(Collection::class);
  }

  public function user(){
    return $this->belongsTo(User::class);
  }

  public function activate(){
    $thisDeck = $this;
    $collection = $thisDeck->collection()->first();
    $decks = $collection->decks()
      ->where('user_id', Auth::id())
      ->get();

    foreach ($decks as $deck):
      if ($deck->id == $thisDeck->id):
        $deck->active = true;
      else:
        $deck->active = false;
      endif;
      $deck->save();
    endforeach;

    return $deck;
  }

  public function clone($request){
    $deck = $this;
    $collection = $deck->collection()->first();
    $deckcards = $deck->deckcards()->get();
    $clone = NULL;
    // if users logged in AND deck is viewable
    // OR user is the owner of deck
    if(Auth::check() && $deck->public !== 'private' || Auth::id() == $deck->user_id):
      $clone = $collection->decks()->create([
        'user_id'     => Auth::id(),
        'name'        => $request->name,
        'description' => $request->description,
        'public'      => $request->public,
        'active'      => false,
      ]);
      
      //fills clone deck with deckcards
      foreach ($deckcards as $deckcard):
        $clone->deckcards()->create([
          'card_id'   => $deckcard->card_id,
          'order'     => 1,
        ]);
      endforeach;

      $clone->activate();
    endif;


    return $clone;
  }
}
