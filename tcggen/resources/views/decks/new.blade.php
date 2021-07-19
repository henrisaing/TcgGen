<!-- resource: new.blade.php -->
<div id="popup-form">
<form id="popup-form" action="/collection/<?=$collection->id?>/deck/store" method="post">
{{ csrf_field() }}

  name <input type="text" name="name"> <br><br>

  description <textarea style="resize:none" name="description"></textarea><br><br>

  <?php if ($auth['owner']): ?>
    <label for="public">
    <input type="radio" name="public" value="public" id="public">public</label>
    <label for="private">
    <input type="radio" name="public" value="private" id="private" checked>private</label>
    <label for="shareable">
    <input type="radio" name="public" value="shareable" id="shareable">shareable</label>
  <?php else: ?>
    <label for="private">
    <input type="radio" name="public" value="private" id="private" checked>private</label>
    <label for="shareable">
    <input type="radio" name="public" value="shareable" id="shareable">shareable</label>
  <?php endif ?>
  
  <br>
  <input type="submit" value="Create Deck">
</form>
</div>