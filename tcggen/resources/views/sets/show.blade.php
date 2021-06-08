@extends('layouts.main')

@section('content')
<div class="container">
  <?= $collection->name; ?>
  <br>
  <?= $set->name; ?>
  <br>
  <?= $set->image; ?>
  <br>
  <?= $set->description; ?>
  <br>
  <?= $set->public; ?>
  <i class="fab fa-apple"></i> 
  <br>

  <a href="/set/<?=$set->id?>/new" style="text-decoration:none;">
    <button class="_lb-link" _func="/set/<?=$set->id?>/new">New Card</button>
  </a>
  <?php foreach ($cards as $card): ?>
    <?= $card->name?>
  <?php endforeach ?>
</div>
@stop