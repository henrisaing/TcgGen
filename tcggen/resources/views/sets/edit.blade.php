<!-- resource view: sets.new -->
<form action="/set/<?=$set->id?>/update" method="post">
{{ csrf_field() }}

  name <input type="text" name="name" value="<?=$set->name?>"> <br>

  image <textarea name="image"><?=$set->image?></textarea> <br>

  description <textarea name="description"><?=$set->description?></textarea><br>

<br><br>
  <input type="radio" name="public" value="public" id="public"
  <?php if ($set['public'] == 'public'): ?>
    checked
  <?php endif ?>
  ><label for="public">public</label><br>

  <input type="radio" name="public" value="private" id="private"
  <?php if ($set['public'] == 'private'): ?>
    checked
  <?php endif ?>
  ><label for="private">private</label>  <br>

  <input type="radio" name="public" value="shareable" id="shareable"
  <?php if ($set['public'] == 'shareable'): ?>
    checked
  <?php endif ?>
  ><label for="shareable">shareable</label> 
  
  <br>
  <input type="submit" value="Update Set">
</form>