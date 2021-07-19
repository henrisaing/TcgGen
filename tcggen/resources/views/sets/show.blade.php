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
  <?= $set->description; ?>
  <br>

  <div id="card-box">
  <div id="sets">
  <?php if ($auth['owner']): ?>
    <a href="/set/<?=$set->id?>/new" style="text-decoration:none;">
      <button class="_lb-link" _func="/set/<?=$set->id?>/new">New Card</button>
    </a>
    <?php if ($template['hasTemplate']): ?>
        <a href="/card/<?=$template['template']->id?>">
          <button>Template</button>
        </a><br>
    <?php endif ?>
  <?php endif ?>

  <br><br>
  <?php foreach ($cards as $card): ?>
    <?php if ($card->name != "[TEMPLATE]"): ?>
    <?php if ($auth['owner'] || $card->public == 'public'): ?>

    <!-- <a href="/card/<?=$card->id?>"> -->
    <!-- card -->
    <div class="card card-portrait card-background-white card-border card-border-radius10 text-white text-border" style="border-color:<?=$card['card-border']?>;background-color:<?=$card['card-border']?>">

      <div class="card-element card-background" element="card-background">
        <?php if (str_contains($card['card-background'], "[IMG]")): ?>
          <img src="<?= str_replace('[IMG]', '', $card['card-background'])?>">
        <?php else: ?>
          <?= $card['card-background']; ?>
        <?php endif; ?>
      </div>

      <div class="card-pic" element="card-pic-upper">
        <?php if (str_contains($card['card-pic-upper'],"[IMG]")): ?>
          <img src="<?= str_replace('[IMG]', '', $card['card-pic-upper'])?>">
        <?php else: ?>
          <?= $card['card-pic-upper']; ?>
        <?php endif; ?>
      </div>
      
      <div class="card-element position-topleft" element="topleft">
        <?php if (str_contains($card['topleft'],"[IMG]")): ?>
          <img src="<?= str_replace('[IMG]', '', $card['topleft'])?>">
        <?php else: ?>
          <?= $card['topleft']; ?>
        <?php endif; ?>
      </div>

      <div class="card-element position-topright" element="topright">
        <?php if (str_contains($card['topright'],"[IMG]")): ?>
          <img src="<?= str_replace('[IMG]', '', $card['topright'])?>">
        <?php else: ?>
          <?= $card['topright']; ?>
        <?php endif; ?>
      </div>

      <div class="card-element position-topmid" element="topmid">
        <?php if (str_contains($card['topmid'],"[IMG]")): ?>
          <img src="<?= str_replace('[IMG]', '', $card['topmid'])?>">
        <?php else: ?>
          <?= $card['topmid']; ?>
        <?php endif; ?>
      </div>
      
      <div class="card-element position-botleft" element="botleft">
        <?php if (str_contains($card['botleft'],"[IMG]")): ?>
          <img src="<?= str_replace('[IMG]', '', $card['botleft'])?>">
        <?php else: ?>
          <?= $card['botleft']; ?>
        <?php endif; ?>
      </div>

      <div class="card-element position-botright" element="botright">
        <?php if (str_contains($card['botright'],"[IMG]")): ?>
          <img src="<?= str_replace('[IMG]', '', $card['botright'])?>">
        <?php else: ?>
          <?= $card['botright']; ?>
        <?php endif; ?>
      </div>

      <div class="card-element position-botmid" element="botmid">
        <?php if (str_contains($card['botmid'],"[IMG]")): ?>
          <img src="<?= str_replace('[IMG]', '', $card['botmid'])?>">
        <?php else: ?>
          <?= $card['botmid']; ?>
        <?php endif; ?>
      </div>

      <div class="card-element position-midcenter" element="midcenter">
        <?php if (str_contains($card['midcenter'],"[IMG]")): ?>
          <img src="<?= str_replace('[IMG]', '', $card['midcenter'])?>">
        <?php else: ?>
          <?= $card['midcenter']; ?>
        <?php endif; ?>
      </div>

      <div class="card-element position-midlower card-background-transparent-dark" element="midlower">
        <?php if (str_contains($card['midlower'],"[IMG]")): ?>
          <img src="<?= str_replace('[IMG]', '', $card['midlower'])?>">
        <?php else: ?>
          <?= $card['midlower']; ?>
        <?php endif; ?>
      </div>

      <div class="card-element position-midleft" element="midleft">
        <?php if (str_contains($card['midleft'],"[IMG]")): ?>
          <img src="<?= str_replace('[IMG]', '', $card['midleft'])?>">
        <?php else: ?>
          <?= $card['midleft']; ?>
        <?php endif; ?>
      </div>

      <div class="card-element position-midright" element="midright">
        <?php if (str_contains($card['midright'],"[IMG]")): ?>
          <img src="<?= str_replace('[IMG]', '', $card['midright'])?>">
        <?php else: ?>
          <?= $card['midright']; ?>
        <?php endif; ?>
      </div>

      <div class="card-element position-midupper" element="midupper">
        <?php if (str_contains($card['midupper'],"[IMG]")): ?>
          <img src="<?= str_replace('[IMG]', '', $card['midupper'])?>">
        <?php else: ?>
          <?= $card['midupper']; ?>
        <?php endif; ?>
      </div>

      <div class="overlay" style="display:none">
        <a class="ajaxPost" func="">
          Add to [active] deck.
        </a>
        <br><br><br>
        <a href="/card/<?=$card->id?>">
          View Card
        </a>
      </div>
    </div> <!-- end card -->
    <!-- </a> -->
  <?php endif; ?>
    <?php endif; ?>
  <?php endforeach; ?>
</div> <!--end sets-->

<div id="decks" style="display:none">
<?php if (Auth::check()): ?>
  <button class="lb-link" func="/collection/<?=$collection->id?>/deck/new">
    New Deck
  </button>
  <br><br><br>
<?php endif ?>
  <?php foreach ($decks as $deck): ?>
    <div class="card card-portrait card-border card-border-radius10" style="border-color:#201F1C;background-color:#201F1C;">

        <a href="/deck/<?=$deck->id?>">
        <div class="card-background">

        </div>
        </a>

        <a href="/deck/<?=$deck->id?>">
          <div class="card-element position-midcenter card-background-white">
            <?=$deck->name?>
          </div>
        </a>

        <div class="card-element position-midlower card-background-transparent text-white text-border">
          <?=$deck->description?>
        </div>

        <div class="card-element position-topmid text-white text-border">
        <button>Set to Active</button>
        </div>
      </div> <!--end card-->
  <?php endforeach ?>
</div> <!--end decks-->

</div> <!--end card-->

<script src="{{ asset('js/search.js') }}"></script>
@stop