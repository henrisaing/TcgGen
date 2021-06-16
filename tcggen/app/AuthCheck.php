<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use App\Card;
use App\Set;
use App\Collection;


class AuthCheck extends Model
{
    //
  public static function collectPerms(Collection $collection){
    // initializes return variable with 
    // owner => false
    // permission type => collection->public
    $permissions = ['owner' => false, 'type' => $collection->public];

    if (Auth::check()):
      if(Auth::user()->id == $collection->user_id):
        $permissions['owner'] = true;
      endif;
    endif;

    return $permissions;
  }

}
