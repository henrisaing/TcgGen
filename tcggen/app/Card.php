<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    //
  protected $fillable = [
    'name',
    'description',
    'public',
    'topleft',
    'topright',
    'topmid',
    'botleft',
    'botright',
    'botmid',
    'midleft',
    'midright',
    'midcenter',
    'midlower',
    'midupper',
    'card-pic-upper',
    'card-pic-full',
    'card-background',
    'card-border',
    'type',
  ];

  public function set(){
    return $this->belongsTo(Set::class);
  }

  public function createCard($set, $request){
    // initializes border as black 
    // then sets border to user input 
    // (failsafe incase user has no border)
    $border = "black";
    if (empty($request['card-border']) == false):
        $border = $request['card-border'];
    endif;

    $card = $set->cards()->create([
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
        'card-border' => $border,
      ]);

    return $card;
  }

  public function updateCard($request){
    $card = $this->update([
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

    return $card;
  }


// super nasty code
  public function updateAllCards($request){
    $set = $this->set()->first();
    $cards = $set->cards()->get();
    $attributes = [
      'description',
      'public',
      'topleft',
      'topright',
      'topmid',
      'botleft',
      'botright',
      'botmid',
      'midleft',
      'midright',
      'midcenter',
      'midlower',
      'midupper',
      'card-pic-upper',
      'card-pic-full',
      'card-background',
      'card-border',
    ];

    // loops through attributes to check request values
    foreach ($attributes as $key):
      // parses out blank spaces
      $tmp = str_replace( chr( 194 ) . chr( 160 ),'', $request[$key]);
      // if request[key] has content
      if ($tmp != ''):
        if ($tmp == '[BLANK]'):
          foreach ($cards as $card):
            $card->update([$key => str_repeat('&nbsp;', 5)]);
          endforeach;
        else:
          foreach ($cards as $card):
            $card->update([$key => $tmp]);
          endforeach;
        endif;
      endif;
    endforeach;
  }

}
