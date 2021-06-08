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

  
}
