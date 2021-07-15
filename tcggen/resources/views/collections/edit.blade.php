<!-- resources/views/collections/edit.blade.php -->
<!-- view requires $auth && $collection -->
<div id="popup-form">
<?php if ($auth['owner']): ?>
  <!-- MVOE AUTH TO CONTROLLER? -->
<form action="/collection/<?=$collection->id?>/update" method="post">
{{ csrf_field() }}

  name <input type="text" name="name" value="<?=$collection->name?>">
  <br><br>

  image <textarea style="resize:none" name="image"><?=$collection->image?></textarea>
  <br><br>

  description 
  <textarea style="resize:none" name="description"><?=$collection->description?></textarea>
  <br><br>

    <label for="public">
      <input type="radio" name="public" value="public" id="public"
        <?php if ($collection['public'] == 'public'): ?>
          checked
        <?php endif ?>
      >public
    </label>

    <label for="private">
      <input type="radio" name="public" value="private" id="private"
      <?php if ($collection['public'] == 'private'): ?>
        checked
      <?php endif ?>
      >private
    </label>

    <label for="shareable">
      <input type="radio" name="public" value="shareable" id="shareable"
        <?php if ($collection['public'] == 'shareable'): ?>
          checked
        <?php endif ?>
      >shareable
    </label> 

  <br>
  <input type="submit" name="submit" value='submit'>
</form>

<?php else: ?>
  <p>
    You do not have permission to edit this collection.
  </p>
<?php endif ?>
</div>