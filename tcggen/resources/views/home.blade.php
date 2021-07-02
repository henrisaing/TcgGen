@extends('layouts.main')

@section('content')
<nav>
    home >> 
    <h2> Collections</h2>
</nav>
    <button class="lb-link" func="/collection/new">new collection</button>

    <br><br>
<div id="card-box">
    <?php foreach($collections as $collection): ?>
        
    <div class="card card-portrait card-border card-border-radius10" style="border-color:#201F1C;background-color:#201F1C;">

      <a href="/collection/{{$collection->id}}">
      <div class="card-background">
        <img src="<?=$collection->image?>">
      </div>
      </a>

      <a href="/collection/{{$collection->id}}">
        <div class="card-element position-midcenter card-background-white">
          <?=$collection->name?>
        </div>
      </a>

      <div class="card-element position-midlower card-background-transparent text-white text-border">
        <?=$collection->description?>
      </div>
      <div class="card-element position-botmid">
    
        <button class="lb-link" func="/collection/<?=$collection->id?>/edit">edit</button>
        <button class="lb-link" func="/collection/<?=$collection->id?>/delete">delete</button>
      </div>
    </div>
    <?php endforeach; ?>
</div>
@endsection
