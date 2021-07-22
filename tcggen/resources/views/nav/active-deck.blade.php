<?php if (Auth::check()): ?>
  Active Deck: 
  <?php if ($collection->activeDeck()): ?>
    <a href="/deck/<?=$collection->activeDeck()->id?>">  
      <?=$collection->activeDeck()->name?> (<span id="count"><?= $collection->activeDeck()->deckcards()->get()->count()?></span>)
    </a>
  <?php else: ?>
    None
  <?php endif; ?>
  <br>
<?php endif ?>