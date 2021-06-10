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
}
