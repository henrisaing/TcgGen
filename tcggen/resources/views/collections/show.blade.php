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
  <button class="lb-link" func="/collection/<?=$collection->id?>/set/new">new set</button>
<?php endif ?>

<br>

<?php foreach ($sets as $set): ?>
  <?php if ($auth['owner'] || $set['public'] == 'public'): ?>
    <br>
    <a href="/collection/<?=$collection->id?>/set/<?=$set->id?>"><?=$set->name?></a>|
    <?=$set->image?>|
    <?=$set->description?>|
    <?=$set->public?>|
    <?php if ($auth['owner']): ?>
      <button class="lb-link" func="/set/<?=$set->id?>/edit">edit</button>
      <button class="lb-link" func="/set/<?=$set->id?>/delete">delete</button>
    <?php endif ?>
    <br>
  <?php endif; ?>
<?php endforeach; ?>
@stop