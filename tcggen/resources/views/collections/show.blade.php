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
<?php print($collection->description) ?>

<br>

<?php if ($auth['owner']): ?>
  <button class="lb-link" func="/collection/<?=$collection->id?>/set/new">
    New Set
  </button>
<?php endif ?>
<?php if (Auth::check()): ?>
  <button class="lb-link" func="/collection/<?=$collection->id?>/deck/new">
    New Deck
  </button>
<?php endif ?>
<br><br>
<div id="card-box">
  <div id="sets">
  <?php foreach ($sets as $set): ?>
    <?php if ($auth['owner'] || $set['public'] == 'public'): ?>
      <div class="card card-portrait card-border card-border-radius10" style="border-color:#201F1C;background-color:#201F1C;">

        <a href="/collection/<?=$collection->id?>/set/<?=$set->id?>">
        <div class="card-background">
          <img src="<?=$set->image?>">
        </div>
        </a>

        <a href="/collection/<?=$collection->id?>/set/<?=$set->id?>">
          <div class="card-element position-midcenter card-background-white">
            <?=$set->name?>
          </div>
        </a>

        <div class="card-element position-midlower card-background-transparent text-white text-border">
          <?=$set->description?>
        </div>
        <div class="card-element position-botmid">
          <?php if ($auth['owner']): ?>
        <button class="lb-link" func="/set/<?=$set->id?>/edit">edit</button>
        <button class="lb-link" func="/set/<?=$set->id?>/delete">delete</button>
      <?php endif ?>
        </div>
      </div> <!--end card-->
    <?php endif; ?>
  <?php endforeach; ?>
  </div> <!--end sets-->

  <div id="decks" style="display:none">
    <?php foreach ($decks as $deck): ?>
      <?=$deck->name ?>
    <?php endforeach ?>
  </div> <!--end decks-->

</div> <!--end cardbox-->

<script src="{{ asset('js/search.js') }}"></script>
@stop