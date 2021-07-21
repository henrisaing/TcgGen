<div id="decks" style="display:none">
<?php if (Auth::check()): ?>
  <button class="lb-link" func="/collection/<?=$collection->id?>/deck/new">
    New Deck
  </button>
  <br><br>
<?php endif ?>
<!-- lists user's decks first -->
  <?php foreach ($decks as $deck): ?>
    <?php if ($deck->user_id == Auth::id()): ?>
    <div class="card card-portrait card-border card-border-radius10" style="border-color:#201F1C;background-color:#201F1C;">

        <a href="/deck/<?=$deck->id?>">
        <div class="card-background">

        </div>
        </a>

        <a href="/deck/<?=$deck->id?>">
          <div class="card-element position-midcenter card-background-white">
            <?=$deck->name?>
          </div>
        </a>

        <div class="card-element position-midlower card-background-transparent text-white text-border">
          <?=$deck->description?>
        </div>

        <?php if ($deck->user_id == Auth::id()): ?>
          <div class="card-element position-topmid text-white text-border">
          <form action="/deck/<?=$deck->id?>/activate" method="post">
            {{ csrf_field() }}
            <input type="submit" value="Set to Active ">
          </form>
        </div>
        <?php endif ?>
        
        <div class="card-element position-botmid text-white text-border">
          <a href="/deck/<?=$deck->id?>">
            <button>View Deck</button>
          </a>
        </div>

        <?php if ($deck->user_id == Auth::id()): ?>
          <div class="card-element position-botleft text-white text-border">
            <button class="lb-link" func="/deck/<?=$deck->id?>/delete">Delete</button>
          </div>
        <?php endif ?>
      </div> <!--end card-->
      <?php endif ?>
  <?php endforeach ?>
<!-- lists public decks afterwards -->
<!-- super sloppy -->
  <?php foreach ($decks as $deck): ?>
    <?php if ($deck->user_id !== Auth::id()): ?>
    <div class="card card-portrait card-border card-border-radius10" style="border-color:#201F1C;background-color:#201F1C;">

        <a href="/deck/<?=$deck->id?>">
        <div class="card-background">

        </div>
        </a>

        <a href="/deck/<?=$deck->id?>">
          <div class="card-element position-midcenter card-background-white">
            <?=$deck->name?>
          </div>
        </a>

        <div class="card-element position-midlower card-background-transparent text-white text-border">
          <?=$deck->description?>
        </div>

        <?php if ($deck->user_id == Auth::id()): ?>
          <div class="card-element position-topmid text-white text-border">
          <form action="/deck/<?=$deck->id?>/activate" method="post">
            {{ csrf_field() }}
            <input type="submit" value="Set to Active ">
          </form>
        </div>
        <?php endif ?>
        
        <div class="card-element position-botmid text-white text-border">
          <a href="/deck/<?=$deck->id?>">
            <button>View Deck</button>
          </a>
        </div>

        <?php if ($deck->user_id == Auth::id()): ?>
          <div class="card-element position-botleft text-white text-border">
            <button class="lb-link" func="/deck/<?=$deck->id?>/delete">Delete</button>
          </div>
        <?php endif ?>
      </div> <!--end card-->
      <?php endif ?>
  <?php endforeach ?>
</div> <!--end decks-->