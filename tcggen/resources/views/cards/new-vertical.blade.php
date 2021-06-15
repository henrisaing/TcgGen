@extends('layouts.main')
@section('content')
<!-- card 1 -->
<div class="card card-portrait card-background-red  card-border card-border-radius10 text-white text-border" id="card">

  <div class="card-element card-background card-background-white hotswaptext" element="card-background"></div>

  <div class="card-pic hotswaptext" element="card-pic-upper"></div>
  
  <div class="card-element card-background-transparent 
              card-top card-left hotswaptext" element="topleft">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </div>

  <div class="card-element card-background-transparent 
              card-top card-right hotswaptext" element="topright">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </div>

  <div class="card-element card-background-transparent 
              card-top card-horizontal-mid hotswaptext" element="topmid">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </div>
  
  <div class="card-element card-background-transparent 
              card-bottom card-left hotswaptext" element="botleft">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </div>

  <div class="card-element card-background-transparent 
              card-bottom card-right hotswaptext" element="botright">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </div>

  <div class="card-element card-background-transparent 
              card-bottom card-horizontal-mid hotswaptext" element="botmid">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </div>

  <div class="card-element card-background-transparent 
              position-midcenter hotswaptext" element="midcenter">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </div>

  <div class="card-element card-background-transparent 
              card-vertical-lower card-horizontal-mid hotswaptext" element="midlower">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </div>

  <div class="card-element card-background-transparent 
              position-midleft hotswaptext" element="midleft">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </div>

  <div class="card-element card-background-transparent 
              position-midright hotswaptext" element="midright">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </div>

  <div class="card-element card-background-transparent 
              position-midupper hotswaptext" element="midupper">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </div>


</div>
<!-- end card 1 -->

<!-- start form for card -->
<div class="card card-portrait">
  <form id='card-form' method="post" action="/set/<?=$set->id?>/store">
  {{ csrf_field() }}
    <label for="name" class="under">
      <input type="text" name="name" id="name"><br>
      name
    </label>
    <br> <br>
    <label class="under">
      <textarea name="description"></textarea>
      <br> description
     </label>
    <br><br>
    <label class="under">
      <input type="text" name="card-border" value="black" id="card-border">
      <br> border color
    </label>

    <br><br>
    <input type="radio" name="public" value="public" id="public"><label for="public">public</label><br>
    <input type="radio" name="public" value="private" id="private" checked><label for="private">private</label>  <br>
    <input type="radio" name="public" value="shareable" id="shareable"><label for="shareable">shareable</label> 
    <br>
    <br>
    <div id="card-fields">
      
    </div>
    <input type="submit" name="" value="submit">
    <button onclick="updateInputs()">save card </button>
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