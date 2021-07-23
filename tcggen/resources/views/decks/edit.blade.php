<!-- resource view: deck.edit -->
<div id="popup-form">
<form action="/deck/<?=$deck->id?>/update" method="post">
{{ csrf_field() }}

  name <input type="text" name="name" value="<?=$deck->name?>"> <br><br>

  description <textarea style="resize:none" name="description"><?=$deck->description?></textarea><br><br>

  <?php if ($auth['owner']): ?>
    <label for="public">
    <input type="radio" name="public" value="public" id="public"
    <?php if ($deck['public'] == 'public'): ?>
      checked
    <?php endif ?>
    >public</label><br>
  <?php endif ?>
  

  <label for="private">
  <input type="radio" name="public" value="private" id="private"
  <?php if ($deck['public'] == 'private'): ?>
    checked
  <?php endif ?>
  >private</label>  <br>

  <label for="shareable">
  <input type="radio" name="public" value="shareable" id="shareable"
  <?php if ($deck['public'] == 'shareable'): ?>
    checked
  <?php endif ?>
  >shareable</label> 
  
  <br>
  <input type="submit" value="Update Deck">
</form>
</div>