<!-- resource view: sets.new -->
<div id="popup-form">
<form id="popup-form" action="/collection/<?=$collection->id?>/set/store" method="post">
{{ csrf_field() }}

  name <input type="text" name="name"> <br><br>

  image <textarea style="resize:none" name="image"></textarea> <br><br>

  description <textarea style="resize:none" name="description"></textarea><br><br>

  <label for="public">
  <input type="radio" name="public" value="public" id="public">public</label>
  <label for="private">
  <input type="radio" name="public" value="private" id="private" checked>private</label>
  <label for="shareable">
  <input type="radio" name="public" value="shareable" id="shareable">shareable</label> 
  
  <br>
  <input type="submit" value="Create Set">
</form>
</div>