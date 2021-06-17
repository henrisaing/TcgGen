@extends('layouts.main')

@section('content')
<div class="container">
  <?php print($collection->name) ?>
  <?php print($collection->image) ?>
  <?php print($collection->description) ?>
  <?php print($collection->public) ?>
  <br>
  <button class="lb-link" func="/collection/<?=$collection->id?>/set/new">new set</button>
  <?php foreach ($sets as $set): ?>
    <br>
    <a href="/collection/<?=$collection->id?>/set/<?=$set->id?>"><?=$set->name?></a>|
    <?=$set->image?>|
    <?=$set->description?>|
    <?=$set->public?>|
    <?php if ($auth['owner']): ?>
      <button class="lb-link" func="/set/<?=$set->id?>/delete">delete</button>
    <?php endif ?>
  <?php endforeach; ?>
</div>

@stop