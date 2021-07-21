<!-- resource view: sets.edit -->
<div id="popup-form">
<form action="/set/<?=$set->id?>/update" method="post">
{{ csrf_field() }}

  name <input type="text" name="name" value="<?=$set->name?>"> <br><br>

  image <textarea style="resize:none" name="image"><?=$set->image?></textarea> <br><br>

  description <textarea style="resize:none" name="description"><?=$set->description?></textarea><br><br>

  <label for="public">
  <input type="radio" name="public" value="public" id="public"
  <?php if ($set['public'] == 'public'): ?>
    checked
  <?php endif ?>
  >public</label><br>

  <label for="private">
  <input type="radio" name="public" value="private" id="private"
  <?php if ($set['public'] == 'private'): ?>
    checked
  <?php endif ?>
  >private</label>  <br>

  <label for="shareable">
  <input type="radio" name="public" value="shareable" id="shareable"
  <?php if ($set['public'] == 'shareable'): ?>
    checked
  <?php endif ?>
  >shareable</label> 
  
  <br>
  <input type="submit" value="Update Set">
</form>
</div>