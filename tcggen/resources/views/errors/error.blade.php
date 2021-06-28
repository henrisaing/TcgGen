@extends('layouts.main')
@section('content')
<nav>
  <a href="/home">home</a> 
  <h2>Error</h2>
</nav>
<br>
<!-- card 1 -->
<div class="card card-portrait card-background-white card-border card-border-radius10 text-white text-border" style="border-color:rgb(80,20,20)">

      <div class="card-element card-background card-background-red" element="card-background">

      </div>

      <div class="card-pic card-error-x" element="card-pic-upper">
        X
      </div>
      
      <div class="card-element position-topleft" element="topleft">

      </div>

      <div class="card-element position-topright" element="topright">

      </div>

      <div class="card-element position-topmid" element="topmid">

      </div>
      
      <div class="card-element position-botleft" element="botleft">

      </div>

      <div class="card-element position-botright" element="botright">

      </div>

      <div class="card-element position-botmid" element="botmid">

      </div>

      <div class="card-element card-error-midcenter position-midcenter" element="midcenter">
        Permission Error
      </div>

      <div class="card-element position-midlower card-background-transparent-dark" element="midlower">
        <?= $errorMsg ?>
      </div>

      <div class="card-element position-midleft" element="midleft">

      </div>

      <div class="card-element position-midright" element="midright">

      </div>

      <div class="card-element position-midupper" element="midupper">

      </div>
    </div>
<!-- end card 1 -->
<!-- scripts -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <!-- <script type="text/javascript">var hotswaptext = ".hotswaptext";</script> -->
    <!-- <script type="text/javascript" src="/js/card.js"></script> -->
    <!-- <script type="text/javascript" src="assets/js/hotswaptext.js"></script> -->

@stop