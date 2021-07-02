@extends('layouts.main')

@section('content')
<nav>
  <a href="/home">home</a> >>
  <h2>  
  <?=$collection->name?>
  </h2>
</nav>

<?php print($collection->name) ?>
<?php print($collection->image) ?>
<?php print($collection->description) ?>
<?php print($collection->public) ?>

<br>

<?php if ($auth['owner']): ?>
  <button class="lb-link" func="/collection/<?=$collection->id?>/set/new">
    new set
  </button>
  <br>
<?php endif ?>

<br><br>
<div id="card-box">
<?php foreach ($sets as $set): ?>
  <?php if ($auth['owner'] || $set['public'] == 'public'): ?>
    <div class="card card-portrait card-border card-border-radius10 card-background-white" style="border-color:#201F1C;">

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
    </div>
  <?php endif; ?>
<?php endforeach; ?>
</div>
@stop