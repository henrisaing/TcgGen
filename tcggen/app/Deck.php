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

}
