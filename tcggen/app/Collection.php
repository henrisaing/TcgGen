<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Collection extends Model
{
    //
  protected $fillable=[
    'name',
    'image',
    'description',
    'public',
  ];

  public function sets(){
    return $this->hasMany(Set::class);
  }

  public function decks(){
    return $this->hasMany(Deck::class);
  }

  public function user(){
    return $this->belongsTo(User::class);
  }

  public function createCollection($request){
    $collection = Auth::user()->collections()->create([
        'name' => $request->name,
        'image' => $request->image,
        'description' => $request->description,
        'public' => $request->public,
      ]);

    return $collection;
  }

  public function updateCollection($request){
    $collection = $this;

    $collection->update([
      'name' => $request->name,
      'image' => $request->image,
      'description' => $request->description,
      'public' => $request->public,
    ]);

    return $collection;
  }

  public function getDecks(){
    $collection = $this;
    $auth = AuthCheck::collectPerms($collection);

    if(Auth::check()):
      $decks = $collection->decks()
        ->where('user_id', Auth::id())
        ->orWhere('public', 'public')
        ->get();
    else:
      $decks = $collection->decks()
        ->where('public', 'public')        
        ->get();
    endif;

    return $decks;
  }

  public function createDeck($collection, $request){
    $auth = AuthCheck::collectPerms($collection);
    $public = $request->public;
    
    if ($auth['owner']):
      $public = $request->public;
    elseif($auth['owner'] == false && $public == 'public'):
      $public = 'private';
    endif;

    $deck = $collection->decks()->create([
        'name' => $request->name,
        'user_id' => Auth::id(),
        'description' => $request->description,
        'public' => $public,
        'active' => false,
      ]);

    return $deck;
  }
}
