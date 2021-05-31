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
  ];

  public function set(){
    return $this->belongsTo(Set::class);
  }
}
