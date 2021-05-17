<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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

  public function user(){
    return $this->belongsTo(User::class);
  }
}
