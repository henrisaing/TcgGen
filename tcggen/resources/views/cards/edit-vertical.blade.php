@extends('layouts.main')
@section('content')
<nav>
  <a href="/home">home</a> >>
  <a href="/collection/<?=$collection->id?>"><?=$collection->name?></a> >>
  <a href="/collection/<?=$collection->id?>/set/<?=$set->id?>"><?=$set->name?></a> >>
  <a href="/card/<?=$card->id?>"><?=$card->name?></a> >>
  <h2>Edit</h2>
</nav>
<!-- card -->
<div class="card card-portrait card-border card-background-white card-border-radius10 text-white text-border" id="card" style="border-color:<?=$card['card-border']?>">

      <div class="card-element card-background hotswaptext" element="card-background">
        <?php if (str_contains($card['card-background'], "[IMG]")): ?>
          <img src="<?= str_replace('[IMG]', '', $card['card-background'])?>">
        <?php else: ?>
          <?= $card['card-background']; ?>
        <?php endif; ?>
      </div>

      <div class="card-pic hotswaptext" element="card-pic-upper">
        <?php if (str_contains($card['card-pic-upper'],"[IMG]")): ?>
          <img src="<?= str_replace('[IMG]', '', $card['card-pic-upper'])?>">
        <?php else: ?>
          <?= $card['card-pic-upper']; ?>
        <?php endif; ?>
      </div>
      
      <div class="card-element position-topleft hotswaptext card-background-transparent" element="topleft">
        <?php if (str_contains($card['topleft'],"[IMG]")): ?>
          <img src="<?= str_replace('[IMG]', '', $card['topleft'])?>">
        <?php else: ?>
          <?= $card['topleft']; ?>
        <?php endif; ?>
      </div>

      <div class="card-element position-topright hotswaptext card-background-transparent" element="topright">
        <?php if (str_contains($card['topright'],"[IMG]")): ?>
          <img src="<?= str_replace('[IMG]', '', $card['topright'])?>">
        <?php else: ?>
          <?= $card['topright']; ?>
        <?php endif; ?>
      </div>

      <div class="card-element position-topmid hotswaptext card-background-transparent" element="topmid">
        <?php if (str_contains($card['topmid'],"[IMG]")): ?>
          <img src="<?= str_replace('[IMG]', '', $card['topmid'])?>">
        <?php else: ?>
          <?= $card['topmid']; ?>
        <?php endif; ?>
      </div>
      
      <div class="card-element position-botleft hotswaptext card-background-transparent" element="botleft">
        <?php if (str_contains($card['botleft'],"[IMG]")): ?>
          <img src="<?= str_replace('[IMG]', '', $card['botleft'])?>">
        <?php else: ?>
          <?= $card['botleft']; ?>
        <?php endif; ?>
      </div>

      <div class="card-element position-botright hotswaptext card-background-transparent" element="botright">
        <?php if (str_contains($card['botright'],"[IMG]")): ?>
          <img src="<?= str_replace('[IMG]', '', $card['botright'])?>">
        <?php else: ?>
          <?= $card['botright']; ?>
        <?php endif; ?>
      </div>

      <div class="card-element position-botmid hotswaptext card-background-transparent" element="botmid">
        <?php if (str_contains($card['botmid'],"[IMG]")): ?>
          <img src="<?= str_replace('[IMG]', '', $card['botmid'])?>">
        <?php else: ?>
          <?= $card['botmid']; ?>
        <?php endif; ?>
      </div>

      <div class="card-element position-midcenter hotswaptext card-background-transparent" element="midcenter">
        <?php if (str_contains($card['midcenter'],"[IMG]")): ?>
          <img src="<?= str_replace('[IMG]', '', $card['midcenter'])?>">
        <?php else: ?>
          <?= $card['midcenter']; ?>
        <?php endif; ?>
      </div>

      <div class="card-element position-midlower hotswaptext card-background-transparent-dark" element="midlower">
        <?php if (str_contains($card['midlower'],"[IMG]")): ?>
          <img src="<?= str_replace('[IMG]', '', $card['midlower'])?>">
        <?php else: ?>
          <?= $card['midlower']; ?>
        <?php endif; ?>
      </div>

      <div class="card-element position-midleft hotswaptext card-background-transparent" element="midleft">
        <?php if (str_contains($card['midleft'],"[IMG]")): ?>
          <img src="<?= str_replace('[IMG]', '', $card['midleft'])?>">
        <?php else: ?>
          <?= $card['midleft']; ?>
        <?php endif; ?>
      </div>

      <div class="card-element position-midright hotswaptext card-background-transparent" element="midright">
        <?php if (str_contains($card['midright'],"[IMG]")): ?>
          <img src="<?= str_replace('[IMG]', '', $card['midright'])?>">
        <?php else: ?>
          <?= $card['midright']; ?>
        <?php endif; ?>
      </div>

      <div class="card-element position-midupper hotswaptext card-background-transparent" element="midupper">
        <?php if (str_contains($card['midupper'],"[IMG]")): ?>
          <img src="<?= str_replace('[IMG]', '', $card['midupper'])?>">
        <?php else: ?>
          <?= $card['midupper']; ?>
        <?php endif; ?>
      </div>
    </div>
<!-- end card 1 -->

<!-- start form for card -->
<div class="card card-portrait">
  <form id='card-form' method="post" action="/card/<?=$card->id?>/update">
  {{ csrf_field() }}
    <!-- NAME INPUT -->
    <label for="name" class="under">
      <input type="text" name="name" id="name" value="<?=$card['name']?>">
      <br>name
    </label>
    <!-- END NAME INPUT -->

    <br> <br> <br>

    <!-- DESCRIPTION INPUT -->
    <label class="under">
      <textarea name="description"><?=$card['description']?></textarea>
      <br> description
     </label>
    <!-- END DECRIPTION INPUT -->

    <br><br><br><br>

    <!-- BORDER COLOR INPUT -->
    <label class="under">
      <input type="text" name="card-border" value="<?=$card['card-border']?>" id="card-border">
      <br> border color
    </label>
    <!-- END BORDER COLOR INPUT -->

    <br><br><br>

    <!-- radio buttons for public -->
    <input type="radio" name="public" value="public" id="public"
    <?php if ($card['public'] == 'public'): ?>
      checked
    <?php endif ?>
    ><label for="public">public</label>
    <br>
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
    <!-- end public radio -->

    <br><br>

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