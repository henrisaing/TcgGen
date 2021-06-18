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


  public function createSet($collection, $request){
    $set = $collection->sets()->create([
        'name' => $request->name,
        'image' => $request->image,
        'description' => $request->description,
        'public' => $request->public,
      ]);
    $set->cards()->create([
      'name' => '[TEMPLATE]',
      'public' => 'private',
      'card-border' => 'black',
      'description' => '',
      'topleft' => '&nbsp;&nbsp;&nbsp;',
      'topright' => '&nbsp;&nbsp;&nbsp;',
      'topmid' => '&nbsp;&nbsp;&nbsp;',
      'botleft' => '&nbsp;&nbsp;&nbsp;',
      'botright' => '&nbsp;&nbsp;&nbsp;',
      'botmid' => '&nbsp;&nbsp;&nbsp;',
      'midleft' => '&nbsp;&nbsp;&nbsp;',
      'midright' => '&nbsp;&nbsp;&nbsp;',
      'midcenter' => '&nbsp;&nbsp;&nbsp;',
      'midlower' => '&nbsp;&nbsp;&nbsp;',
      'midupper' => '&nbsp;&nbsp;&nbsp;',
      'card-pic-upper' => '',
      'card-pic-full' => '',
      'card-background' => '',
    ]);

    return $set;
  }


  public function template(){
    $cards = $this->cards()->get();
    $template = ["hasTemplate" => false, "template" => null];

    foreach ($cards as $card):
      if($card->name == "[TEMPLATE]"):
        $template['hasTemplate'] = true;
        $template['template'] = $card;
      endif;
    endforeach;

    return $template;
  }

  public function updateSet($request){
    $set = $this;

    $set->update([
      'name' => $request->name,
      'image' => $request->image,
      'description' => $request->description,
      'public' => $request->public,
    ]);

    return $set;
  }
}
