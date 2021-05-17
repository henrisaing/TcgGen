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
  ];

  public function set(){
    return $this->belongsTo(Set::class);
  }
}
