@extends('layouts.main')

@section('content')
<nav>
  <a href="/home">home</a> >>
  <h2>
    <?php if (!(empty($collection->name))): ?>
      <?=$collection->name?>
    <?php else: ?>
      Collection
    <?php endif; ?>
    : 
    <a id="showSets">Sets</a> 
    / 
    <a href="" id="showDecks">Decks</a> 
  </h2>
  <input id="search" type="text" placeholder="Search">
</nav>
  @include('nav.active-deck')
<?php print($collection->description) ?>
<div id="card-box">
  
  @include('sets.index')
  @include('decks.index')

</div> <!--end cardbox-->

<script src="{{ asset('js/search.js') }}"></script>
@stop