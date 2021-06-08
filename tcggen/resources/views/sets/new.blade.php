<!-- resource view: sets.new -->
<form action="/collection/<?=$collection->id?>/set/store" method="post">
{{ csrf_field() }}

  name <input type="text" name="name"> <br>

  image <textarea name="image"></textarea> <br>

  description <textarea name="description"></textarea><br>

  <input type="radio" name="public" value="public" id="public"><label for="public">public</label>  <br>
  <input type="radio" name="public" value="private" id="private" checked><label for="private">private</label>  <br>
  <input type="radio" name="public" value="shareable" id="shareable"><label for="shareable">shareable</label> 
  
  <br>
  <input type="submit" value="Create Set">
</form>