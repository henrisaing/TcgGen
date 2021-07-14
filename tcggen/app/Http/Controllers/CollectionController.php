<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Collection;
use App\Set;
use App\AuthCheck;
use Auth;

class CollectionController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(){
      return view('collections.index');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function new(){
      return view('collections.new');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request){
    $collection = new Collection();
    $collection->createCollection($request);

    return redirect('/home');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show(Collection $collection){
    $sets = $collection->sets()->get();
    $auth = AuthCheck::collectPerms($collection);

    if ($auth['owner'] || $auth['type'] == 'public' || $auth['type'] == 'shareable'):
      $view = view('collections.show',[
        'collection' => $collection,
        'sets' => $sets,
        'auth' => $auth,
      ]);
    else:
      $msg = "You do not have permission to view this collection.";
      $view = view('errors.error', ['errorMsg' => $msg]);
    endif;

    return $view;
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function editCollection(Collection $collection){
    $auth = AuthCheck::collectPerms($collection);
    $view = view('collections.edit', [
      'collection' => $collection,
      'auth' => $auth,
    ]);

    return $view;
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function updateCollection(Collection $collection, Request $request){
    if (AuthCheck::collectPerms($collection)['owner']):
      $collection->updateCollection($request);
      $view = redirect('/home');
    else:
      $view = 'You do not have permission to update this collection.';
    endif;

    return $view;
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function deleteCollectionForm(Collection $collection){
    if(AuthCheck::collectPerms($collection)['owner']):
      $view = view('collections.delete', ['collection'=>$collection]);
    else:
      $view = 'permission denied';
    endif;

    return $view;
  }

  public function deleteCollection(Collection $collection){
    if(AuthCheck::collectPerms($collection)['owner']):
      $collection->delete();
    endif;

    $view = redirect('/home');

    return $view;
  }
}
