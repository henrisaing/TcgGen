<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Set extends Model
{
    //
  protected $fillable = [
    'name',
    'image',
    'description',
    'public',
  ];

  public function cards(){
    return $this->hasMany(Card::class);
  }

  public function collection(){
    return $this->belongsTo(Collection::class);
  }
}
