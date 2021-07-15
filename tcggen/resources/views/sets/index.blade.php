<!-- resource: sets.index -->
<div class="overflow">
<h3>Go To</h3>
<?php foreach ($sets as $set): ?>  
  <?php if ($auth['owner'] || $set['public'] == 'public'): ?>
    <a href="/collection/<?=$collection->id?>/set/<?=$set->id?>" style="color:rgb(40,80,200);font-weight:400;">
      <?php if ($set->name != ""): ?>
        <?=$set->name?>
      <?php else: ?>
        Set <?=$set->id?>
      <?php endif ?>
    </a>
    <br>
  <?php endif; ?>
<?php endforeach; ?>
</div>