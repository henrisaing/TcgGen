@extends('layouts.main')
@section('content')
<nav>
  <a href="/home">home</a> >>
  <a href="/collection/<?=$collection->id?>"><?=$collection->name?></a> >>
  <a href="/collection/<?=$collection->id?>/set/<?=$set->id?>"><?=$set->name?></a> >>
  <?=$card->name?>
  <?php if ($auth['owner']): ?>
    >>
    <a href="/card/<?=$card->id?>/edit">edit</a>
  <?php endif ?>
  <h2><?=$card->name?></h2>
</nav>
<br>
<!-- card 1 -->
<div class="card card-portrait card-background-white card-border card-border-radius10 text-white text-border" style="border-color:<?=$card['card-border']?>;background-color:<?=$card['card-border']?>">

      <div class="card-element card-background card-background-white" element="card-background">
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
    </div>
<!-- end card 1 -->
<!-- scripts -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <!-- <script type="text/javascript">var hotswaptext = ".hotswaptext";</script> -->
    <!-- <script type="text/javascript" src="/js/card.js"></script> -->
    <!-- <script type="text/javascript" src="assets/js/hotswaptext.js"></script> -->

@stop