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
}
