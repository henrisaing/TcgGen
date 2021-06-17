@extends('layouts.main')

@section('content')
<div class="container">
  <!--   <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div> -->
    Welcome <?= $user->name ?>
    <h2> Collections</h2>
    <div>
        <button class="lb-link" func="/collection/new">new collection</button>
        <?php foreach($collections as $collection): ?>
            <br>
            <a href="/collection/{{$collection->id}}"><?php print($collection['name']); ?></a>
            |<?php print($collection['image']); ?>
            |<?php print($collection['description']); ?>
            |<?php print($collection['public']); ?>
            <button class="lb-link" func="/collection/<?=$collection->id?>/delete">delete</button>
            <br>
        <?php endforeach; ?>
    </div>
</div>
@endsection
