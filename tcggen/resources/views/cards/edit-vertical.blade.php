@extends('layouts.main')
@section('content')
<nav>
  <a href="/home">home</a> >>
  <a href="/collection/<?=$collection->id?>"><?=$collection->name?></a> >>
  <a href="/collection/<?=$collection->id?>/set/<?=$set->id?>"><?=$set->name?></a> >>
  <?=$card->name?> >>
  <!-- AUTH CHECK FOR EDIT LINKS LATER -->
  <strong>edit</strong>
  <!-- IMPORTANT -->
</nav>
<!-- card -->
<div class="card card-portrait card-background-red card-border card-border-radius10 text-white text-border" id="card" style="border-color:<?=$card['card-border']?>">

      <div class="card-element card-background card-background-white hotswaptext" element="card-background">
        <?php if (preg_match("/[IMG]/i",$card['card-background'])): ?>
          <img src="<?= str_replace('[IMG]', '', $card['card-background'])?>">
        <?php endif; ?>
      </div>

      <div class="card-pic hotswaptext" element="card-pic-upper">
        <?php if (preg_match("/[IMG]/i",$card['card-pic-upper'])): ?>
          <img src="<?= str_replace('[IMG]', '', $card['card-pic-upper'])?>">
        <?php endif; ?>
      </div>
      
      <div class="card-element position-topleft hotswaptext card-background-transparent" element="topleft"><?= $card['topleft']; ?></div>

      <div class="card-element position-topright hotswaptext card-background-transparent" element="topright"><?= $card['topright']; ?></div>

      <div class="card-element position-topmid hotswaptext card-background-transparent" element="topmid"><?= $card['topmid']; ?></div>
      
      <div class="card-element position-botleft hotswaptext card-background-transparent" element="botleft"><?= $card['botleft']; ?></div>

      <div class="card-element position-botright hotswaptext card-background-transparent" element="botright"><?= $card['botright']; ?></div>

      <div class="card-element position-botmid hotswaptext card-background-transparent" element="botmid"><?= $card['botmid']; ?></div>

      <div class="card-element position-midcenter hotswaptext card-background-transparent" element="midcenter"><?= $card['midcenter']; ?></div>

      <div class="card-element position-midlower hotswaptext card-background-transparent" element="midlower"><?= $card['midlower']; ?></div>

      <div class="card-element position-midleft hotswaptext card-background-transparent" element="midleft"><?= $card['midleft']; ?></div>

      <div class="card-element position-midright hotswaptext card-background-transparent" element="midright"><?= $card['midright']; ?></div>

      <div class="card-element position-midupper hotswaptext card-background-transparent" element="midupper"><?= $card['midupper']; ?></div>
    </div>
<!-- end card 1 -->

<!-- start form for card -->
<div class="card card-portrait">
  <form id='card-form' method="post" action="/card/<?=$card->id?>/update">
  {{ csrf_field() }}
    <label for="name" class="under">
      <input type="text" name="name" id="name" value="<?=$card['name']?>"><br>
      name
    </label>
    <br> <br>
    <label class="under">
      <textarea name="description"><?=$card['description']?></textarea>
      <br> description
     </label>
    <br><br>
    <label class="under">
      <input type="text" name="card-border" value="<?=$card['card-border']?>" id="card-border">
      <br> border color
    </label>

    <br><br>
    <input type="radio" name="public" value="public" id="public"
    <?php if ($card['public'] == 'public'): ?>
      checked
    <?php endif ?>
    ><label for="public">public</label><br>

    <input type="radio" name="public" value="private" id="private"
    <?php if ($card['public'] == 'private'): ?>
      checked
    <?php endif ?>
    ><label for="private">private</label>  <br>

    <input type="radio" name="public" value="shareable" id="shareable"
    <?php if ($card['public'] == 'shareable'): ?>
      checked
    <?php endif ?>
    ><label for="shareable">shareable</label> 
    <br>
    <br>
    <div id="card-fields">
      
    </div>
    <input type="submit" name="" value="Save Changes">
    <!-- <button onclick="updateInputs()">save card </button> -->
    <button class="lb-link" func="/card/<?=$card->id?>/delete">Delete</button>
  </form>
  
</div>
<!-- end card form -->

<!-- scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- <script type="text/javascript">var hotswaptext = ".hotswaptext";</script> -->
    <script type="text/javascript" src="/js/card.js"></script>
    <!-- <script type="text/javascript" src="assets/js/hotswaptext.js"></script> -->
    <script type="text/javascript">
      $('#card-border').on('change',function(){
        $('#card').css('border-color', $(this)[0].value);
      });
    </script>

@stop