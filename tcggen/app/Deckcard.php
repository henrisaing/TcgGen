<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Deck;

class Deckcard extends Model
{
  protected $fillable=[
    'card_id',
    'order'
  ];
    //
  public function deck(){
    return $this->belongsTo(Deck::class);
  }

  public function card(){
    return $this->belongsTo(Card::class);
  }
}
