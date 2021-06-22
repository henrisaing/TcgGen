@extends('layouts.main')

@section('content')
<?php if ($auth['owner'] || $set->public == 'public' || $set->public == 'shareable'): ?>
  
<nav>
  <a href="/home">home</a> >>
  <a href="/collection/<?=$collection->id?>"><?=$collection->name?></a> >>
  <h2>    
    <?=$set->name?>
  </h2>
</nav>
  IMG <?= $set->image; ?> | DESC <?= $set->description; ?> | PUB <?= $set->public; ?>
  <br>
  
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

  <br>

  <div id="card-box">
  <?php foreach ($cards as $card): ?>
    <?php if ($card->name != "[TEMPLATE]"): ?>
    <?php if ($auth['owner'] || $card->public == 'public'): ?>

    <a href="/card/<?=$card->id?>">
    <!-- card -->
    <div class="card card-portrait card-border card-background-white card-border-radius10 text-white text-border" style="border-color:<?=$card['card-border']?>">

      <div class="card-element card-background card-background-white" element="card-background">
        <?php if (preg_match("/[IMG]/i",$card['card-background'])): ?>
          <img src="<?= str_replace('[IMG]', '', $card['card-background'])?>">
        <?php endif; ?>
      </div>

      <div class="card-pic" element="card-pic-upper">
        <?php if (preg_match("/[IMG]/i",$card['card-pic-upper'])): ?>
          <img src="<?= str_replace('[IMG]', '', $card['card-pic-upper'])?>">
        <?php endif; ?>
      </div>
      
      <div class="card-element position-topleft" element="topleft"><?= $card['topleft']; ?></div>

      <div class="card-element position-topright" element="topright"><?= $card['topright']; ?></div>

      <div class="card-element position-topmid" element="topmid"><?= $card['topmid']; ?></div>
      
      <div class="card-element position-botleft" element="botleft"><?= $card['botleft']; ?></div>

      <div class="card-element position-botright" element="botright"><?= $card['botright']; ?></div>

      <div class="card-element position-botmid" element="botmid"><?= $card['botmid']; ?></div>

      <div class="card-element position-midcenter" element="midcenter"><?= $card['midcenter']; ?></div>

      <div class="card-element position-midlower" element="midlower"><?= $card['midlower']; ?></div>

      <div class="card-element position-midleft" element="midleft"><?= $card['midleft']; ?></div>

      <div class="card-element position-midright" element="midright"><?= $card['midright']; ?></div>

      <div class="card-element position-midupper" element="midupper"><?= $card['midupper']; ?></div>
    </div>
    <!-- end card -->
    </a>
  <?php endif; ?>
    <?php endif; ?>
  <?php endforeach; ?>
</div>

<?php else: ?>
  You do not have permission to view this set.
<?php endif; ?>
@stop