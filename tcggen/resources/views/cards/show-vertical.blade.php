@extends('layouts.main')
@section('content')
<nav>
  <a href="/collection/<?=$collection->id?>"><?=$collection->name?></a>>>
  <a href="/collection/<?=$collection->id?>/set/<?=$set->id?>"><?=$set->name?></a>>>
  <?=$card->name?>>>
  <!-- AUTH CHECK FOR EDIT LINKS LATER -->
  <a href="/card/<?=$card->id?>/edit">edit</a>
  <!-- IMPORTANT -->
</nav>
<!-- card 1 -->
<div class="card card-portrait card-background-red card-border card-border-radius10 text-white text-border" style="border-color:<?=$card['card-border']?>">

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
<!-- end card 1 -->
<!-- scripts -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <!-- <script type="text/javascript">var hotswaptext = ".hotswaptext";</script> -->
    <!-- <script type="text/javascript" src="/js/card.js"></script> -->
    <!-- <script type="text/javascript" src="assets/js/hotswaptext.js"></script> -->

@stop