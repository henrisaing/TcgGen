@extends('layouts.main')
@section('content')
<!-- card 1 -->
<div class="card card-portrait card-background-red  card-border card-border-radius10 text-white text-border" id="card">

  <div class="card-element card-background card-background-white hotswaptext" element="card-background">
    <?php if ($template['hasTemplate']): ?>
      <?= $template['template']['card-background']; ?>
    <?php endif ?>
  </div>

  <div class="card-pic hotswaptext" element="card-pic-upper">
    <?php if ($template['hasTemplate'] && !empty($template['template']['card-pic-upper'])): ?>
      <?= $template['template']['card-pic-upper']; ?>
    <?php endif ?>
  </div>
  
  <div class="card-element card-background-transparent 
              card-top card-left hotswaptext" element="topleft">
    <?php if ($template['hasTemplate'] && !empty($template['template']['topleft'])): ?>
      <?= $template['template']['topleft']; ?>
    <?php else: ?>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <?php endif?>
  </div>

  <div class="card-element card-background-transparent 
              card-top card-right hotswaptext" element="topright">
    <?php if ($template['hasTemplate'] && !empty($template['template']['topright'])): ?>
      <?= $template['template']['topright']; ?>
    <?php else: ?>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <?php endif?>
  </div>

  <div class="card-element card-background-transparent 
              card-top card-horizontal-mid hotswaptext" element="topmid">
    <?php if ($template['hasTemplate'] && !empty($template['template']['topmid'])): ?>
      <?= $template['template']['topmid']; ?>
    <?php else: ?>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <?php endif?>
  </div>
  
  <div class="card-element card-background-transparent 
              card-bottom card-left hotswaptext" element="botleft">
    <?php if ($template['hasTemplate'] && !empty($template['template']['botleft'])): ?>
      <?= $template['template']['botleft']; ?>
    <?php else: ?>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <?php endif?>
  </div>

  <div class="card-element card-background-transparent 
              card-bottom card-right hotswaptext" element="botright">
    <?php if ($template['hasTemplate'] && !empty($template['template']['botright'])): ?>
      <?= $template['template']['botright']; ?>
    <?php else: ?>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <?php endif?>
  </div>

  <div class="card-element card-background-transparent 
              card-bottom card-horizontal-mid hotswaptext" element="botmid">
    <?php if ($template['hasTemplate'] && !empty($template['template']['botmid'])): ?>
      <?= $template['template']['botmid']; ?>
    <?php else: ?>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <?php endif?>
  </div>

  <div class="card-element card-background-transparent 
              position-midcenter hotswaptext" element="midcenter">
    <?php if ($template['hasTemplate'] && !empty($template['template']['midcenter'])): ?>
      <?= $template['template']['midcenter']; ?>
    <?php else: ?>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <?php endif?>
  </div>

  <div class="card-element card-background-transparent 
              card-vertical-lower card-horizontal-mid hotswaptext" element="midlower">
    <?php if ($template['hasTemplate'] && !empty($template['template']['midlower'])): ?>
      <?= $template['template']['midlower']; ?>
    <?php else: ?>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <?php endif?>
  </div>

  <div class="card-element card-background-transparent 
              position-midleft hotswaptext" element="midleft">
    <?php if ($template['hasTemplate'] && !empty($template['template']['midleft'])): ?>
      <?= $template['template']['midleft']; ?>
    <?php else: ?>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <?php endif?>
  </div>

  <div class="card-element card-background-transparent 
              position-midright hotswaptext" element="midright">
    <?php if ($template['hasTemplate'] && !empty($template['template']['midright'])): ?>
      <?= $template['template']['midright']; ?>
    <?php else: ?>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <?php endif?>
  </div>

  <div class="card-element card-background-transparent 
              position-midupper hotswaptext" element="midupper">
    <?php if ($template['hasTemplate'] && !empty($template['template']['midupper'])): ?>
      <?= $template['template']['midupper']; ?>
    <?php else: ?>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <?php endif?>
  </div>


</div>
<!-- end card 1 -->

<!-- start form for card -->
<div class="card card-portrait">
  <form id='card-form' method="post" action="/set/<?=$set->id?>/store">
  {{ csrf_field() }}
    <label for="name" class="under">
      <input type="text" name="name" id="name">
      <br> name
    </label>
    <br> <br>
    <label class="under">
      <textarea name="description">
        <?php if ($template['hasTemplate']): ?>
          <?= $template['template']['description']; ?>
        <?php endif; ?>
      </textarea>
      <br> description
     </label>
    <br><br>
    <label class="under">
      <?php if ($template['hasTemplate']): ?>
        <input type="text" name="card-border" value="<?= $template['template']['card-border']; ?>" id="card-border">
      <?php else: ?>
        <input type="text" name="card-border" value="black" id="card-border">
      <?php endif?>
      <br> border color
    </label>

    <br><br>
    <input type="radio" name="public" value="public" id="public"><label for="public"
      <?php if ($template['hasTemplate'] && $template['template']['public'] == 'public'): ?>
          checked
      <?php endif; ?>
    >public</label><br>

    <input type="radio" name="public" value="private" id="private" 
      <?php if ($template['hasTemplate']):?>
        <?php if ($template['template']['public'] == 'private'): ?>
          checked
        <?php endif; ?>
      <?php else:?>
        checked
      <?php endif; ?> 

    ><label for="private">private</label>  <br>
    <input type="radio" name="public" value="shareable" id="shareable"
      <?php if ($template['hasTemplate'] && $template['template']['public'] == 'shareable'): ?>
          checked
      <?php endif; ?>
    ><label for="shareable">shareable</label> 
    <br>
    <br>
    <div id="card-fields">
      
    </div>
    <input type="submit" name="" value="submit">
    <!-- <button onclick="updateInputs()">save card </button> -->
  </form>
</div>
<!-- end card form -->

<!-- scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- <script type="text/javascript">var hotswaptext = ".hotswaptext";</script> -->
    <script type="text/javascript" src="/js/card.js"></script>
    <!-- <script type="text/javascript" src="assets/js/hotswaptext.js"></script> -->
    <script type="text/javascript">
      $(document).ready(function(){
        $('#card-border').on('change',function(){
          $('#card').css('border-color', $(this)[0].value);
        }).change();
      });
    </script>

@stop