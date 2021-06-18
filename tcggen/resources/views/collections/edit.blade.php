<!-- resources/views/collections/edit.blade.php -->
<!-- view requires $auth && $collection -->
<?php if ($auth['owner']): ?>
  <!-- MVOE AUTH TO CONTROLLER? -->
<form action="/collection/<?=$collection->id?>/update" method="post">
{{ csrf_field() }}

  name <input type="text" name="name" value="<?=$collection->name?>">
  <br>

  image <textarea name="image" rows="3"><?=$collection->image?></textarea>
  <br>

  description 
  <textarea name="description" rows="3"><?=$collection->description?></textarea>
  <br>

  <br><br>
    <input type="radio" name="public" value="public" id="public"
    <?php if ($collection['public'] == 'public'): ?>
      checked
    <?php endif ?>
    ><label for="public">public</label><br>

    <input type="radio" name="public" value="private" id="private"
    <?php if ($collection['public'] == 'private'): ?>
      checked
    <?php endif ?>
    ><label for="private">private</label>  <br>

    <input type="radio" name="public" value="shareable" id="shareable"
    <?php if ($collection['public'] == 'shareable'): ?>
      checked
    <?php endif ?>
    ><label for="shareable">shareable</label> 

  <br>
  <input type="submit" name="submit" value='submit'>
</form>

<?php else: ?>
  You do not have permission to edit this collection.
<?php endif ?>