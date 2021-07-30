@extends('layouts.main')

@section('content')
<nav>
    <a href="/home">home</a> >>
    <a href="/collection/<?=$collection->id?>">
      <?php if (!(empty($collection->name))): ?>
        <?=$collection->name?>
      <?php else: ?>
        Collection
      <?php endif; ?>
    </a> 
    <a class="lb-link" href="" func="/collection/<?=$collection->id?>/sets">  
      <strong> >> </strong>
    </a>

    <h2>
      <?php if (!(empty($set->name))): ?>
        <?=$set->name?>
      <?php else: ?>
        Set
      <?php endif; ?>
      : 
      <a id="showSets">Cards</a> 
      / 
      <a href="" id="showDecks">Decks</a> 
      </h2>
  <input id="search" type="text" placeholder="Search">
</nav>
  <div id="info">
  @include('nav.active-deck')
    <?= $set->description; ?>
    <br>
  </div>
  
  <div id="card-box">
  
  @include('cards.index-vertical')
  
  @include('decks.index')

</div> <!--end card-->

<script src="{{ asset('js/search.js') }}"></script>
@stop