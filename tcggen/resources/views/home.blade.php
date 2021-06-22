@extends('layouts.main')

@section('content')
<nav>
    home >> 
    <h2> Collections</h2>
</nav>
    <button class="lb-link" func="/collection/new">new collection</button>

    <br>
    
    <?php foreach($collections as $collection): ?>
        <br>
        <a href="/collection/{{$collection->id}}"><?php print($collection['name']); ?></a>
        |<?php print($collection['image']); ?>
        |<?php print($collection['description']); ?>
        |<?php print($collection['public']); ?>
        
        <button class="lb-link" func="/collection/<?=$collection->id?>/edit">edit</button>
        <button class="lb-link" func="/collection/<?=$collection->id?>/delete">delete</button>
        <br>
    <?php endforeach; ?>
@endsection
