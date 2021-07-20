<?php if (Auth::check()): ?>
  Active Deck: 
  <?php if ($collection->activeDeck()): ?>
    <a href="/deck/<?=$collection->activeDeck()->id?>">  
      <?=$collection->activeDeck()->name?>
    </a>
  <?php else: ?>
    None
  <?php endif; ?>
  <br>
<?php endif ?>