@extends('layouts.main')

@section('content')
<nav>
  <a href="/home">home</a> >>
  <?=$collection->name?>
</nav>

<div class="container">
  <?php print($collection->name) ?>
  <?php print($collection->image) ?>
  <?php print($collection->description) ?>
  <?php print($collection->public) ?>
  <?php if ($auth['owner']): ?>
  <br>
    <button class="lb-link" func="/collection/<?=$collection->id?>/set/new">new set</button>
  <?php endif ?>
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
    <?php endif; ?>
  <?php endforeach; ?>
</div>
@stop