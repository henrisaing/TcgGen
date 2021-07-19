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
      <?php if (!(empty($deck->name))): ?>
        <?=$deck->name?>
      <?php else: ?>
        Deck
      <?php endif; ?>
      </h2>
  <input id="search" type="text" placeholder="Search">
</nav>
<?= $deck->description; ?>
<br>

<br><br>

<div id="card-box">
  <?php foreach ($deckcards as $deckcard): ?>
    <?=$deckcard->card_id  ?>
  <?php endforeach ?>

</div> <!--end cardbox-->

<script src="{{ asset('js/search.js') }}"></script>
@stop