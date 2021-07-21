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
    Deck >>
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
    <a href="" class="ajaxPost" func="/deck/<?=$deck->id?>/<?=$deckcard->id?>/remove">
      <?=$deckcard->card()->first()->name  ?>

    </a>

    <!-- card -->
    <div class="card card-portrait card-background-white card-border card-border-radius10 text-white text-border" style="border-color:<?=$deckcard->card()->first()['card-border']?>;background-color:<?=$deckcard->card()->first()['card-border']?>">

      <div class="card-element card-background" element="card-background">
        <?php if (str_contains($deckcard->card()->first()['card-background'], "[IMG]")): ?>
          <img src="<?= str_replace('[IMG]', '', $deckcard->card()->first()['card-background'])?>">
        <?php else: ?>
          <?= $deckcard->card()->first()['card-background']; ?>
        <?php endif; ?>
      </div>

      <div class="card-pic" element="card-pic-upper">
        <?php if (str_contains($deckcard->card()->first()['card-pic-upper'],"[IMG]")): ?>
          <img src="<?= str_replace('[IMG]', '', $deckcard->card()->first()['card-pic-upper'])?>">
        <?php else: ?>
          <?= $deckcard->card()->first()['card-pic-upper']; ?>
        <?php endif; ?>
      </div>
      
      <div class="card-element position-topleft" element="topleft">
        <?php if (str_contains($deckcard->card()->first()['topleft'],"[IMG]")): ?>
          <img src="<?= str_replace('[IMG]', '', $deckcard->card()->first()['topleft'])?>">
        <?php else: ?>
          <?= $deckcard->card()->first()['topleft']; ?>
        <?php endif; ?>
      </div>

      <div class="card-element position-topright" element="topright">
        <?php if (str_contains($deckcard->card()->first()['topright'],"[IMG]")): ?>
          <img src="<?= str_replace('[IMG]', '', $deckcard->card()->first()['topright'])?>">
        <?php else: ?>
          <?= $deckcard->card()->first()['topright']; ?>
        <?php endif; ?>
      </div>

      <div class="card-element position-topmid" element="topmid">
        <?php if (str_contains($deckcard->card()->first()['topmid'],"[IMG]")): ?>
          <img src="<?= str_replace('[IMG]', '', $deckcard->card()->first()['topmid'])?>">
        <?php else: ?>
          <?= $deckcard->card()->first()['topmid']; ?>
        <?php endif; ?>
      </div>
      
      <div class="card-element position-botleft" element="botleft">
        <?php if (str_contains($deckcard->card()->first()['botleft'],"[IMG]")): ?>
          <img src="<?= str_replace('[IMG]', '', $deckcard->card()->first()['botleft'])?>">
        <?php else: ?>
          <?= $deckcard->card()->first()['botleft']; ?>
        <?php endif; ?>
      </div>

      <div class="card-element position-botright" element="botright">
        <?php if (str_contains($deckcard->card()->first()['botright'],"[IMG]")): ?>
          <img src="<?= str_replace('[IMG]', '', $deckcard->card()->first()['botright'])?>">
        <?php else: ?>
          <?= $deckcard->card()->first()['botright']; ?>
        <?php endif; ?>
      </div>

      <div class="card-element position-botmid" element="botmid">
        <?php if (str_contains($deckcard->card()->first()['botmid'],"[IMG]")): ?>
          <img src="<?= str_replace('[IMG]', '', $deckcard->card()->first()['botmid'])?>">
        <?php else: ?>
          <?= $deckcard->card()->first()['botmid']; ?>
        <?php endif; ?>
      </div>

      <div class="card-element position-midcenter" element="midcenter">
        <?php if (str_contains($deckcard->card()->first()['midcenter'],"[IMG]")): ?>
          <img src="<?= str_replace('[IMG]', '', $deckcard->card()->first()['midcenter'])?>">
        <?php else: ?>
          <?= $deckcard->card()->first()['midcenter']; ?>
        <?php endif; ?>
      </div>

      <div class="card-element position-midlower card-background-transparent-dark" element="midlower">
        <?php if (str_contains($deckcard->card()->first()['midlower'],"[IMG]")): ?>
          <img src="<?= str_replace('[IMG]', '', $deckcard->card()->first()['midlower'])?>">
        <?php else: ?>
          <?= $deckcard->card()->first()['midlower']; ?>
        <?php endif; ?>
      </div>

      <div class="card-element position-midleft" element="midleft">
        <?php if (str_contains($deckcard->card()->first()['midleft'],"[IMG]")): ?>
          <img src="<?= str_replace('[IMG]', '', $deckcard->card()->first()['midleft'])?>">
        <?php else: ?>
          <?= $deckcard->card()->first()['midleft']; ?>
        <?php endif; ?>
      </div>

      <div class="card-element position-midright" element="midright">
        <?php if (str_contains($deckcard->card()->first()['midright'],"[IMG]")): ?>
          <img src="<?= str_replace('[IMG]', '', $deckcard->card()->first()['midright'])?>">
        <?php else: ?>
          <?= $deckcard->card()->first()['midright']; ?>
        <?php endif; ?>
      </div>

      <div class="card-element position-midupper" element="midupper">
        <?php if (str_contains($deckcard->card()->first()['midupper'],"[IMG]")): ?>
          <img src="<?= str_replace('[IMG]', '', $deckcard->card()->first()['midupper'])?>">
        <?php else: ?>
          <?= $deckcard->card()->first()['midupper']; ?>
        <?php endif; ?>
      </div>

      <div class="overlay" style="display:none">
        <?php if ($deck->user_id == Auth::id()): ?>
          <?php if ($collection->activeDeck()): ?>
          <a href="" class="ajaxPost" func="/deck/<?=$deck->id?>/<?=$deckcard->id?>/remove">Remove from  
            [<?=$collection->activeDeck()->name?>]
          </a>
          <?php endif; ?>
        <?php endif ?>
        <br><br><br>
        <a href="/card/<?=$deckcard->card()->first()->id?>">
          View Card
        </a>
      </div>
    </div> <!-- end card -->

  <?php endforeach ?>

</div> <!--end cardbox-->

<script src="{{ asset('js/search.js') }}"></script>
@stop