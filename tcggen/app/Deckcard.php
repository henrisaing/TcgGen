<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deckcard extends Model
{
    //
  public function deck(){
    return $this->belongsTo(Deck::class);
  }

  public function card(){
    return $this->belongsTo(Card::class);
  }
}
