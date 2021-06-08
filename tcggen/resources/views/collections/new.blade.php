<!-- resources/views/collections/new.blade.php -->

<form action="/collection/store" method="post">
{{ csrf_field() }}

  name <input type="text" name="name">
  <br>

  image <textarea name="image" rows="3"></textarea>
  <br>

  description 
  <textarea name="description" rows="3"></textarea>
  <br>

  <input type="radio" name="public" value="public" id="public"><label for="public">public</label>  <br>
  <input type="radio" name="public" value="private" id="private" checked><label for="private">private</label>  <br>
  <input type="radio" name="public" value="shareable" id="shareable"><label for="shareable">shareable</label> 

  <br>
  <input type="submit" name="submit" value='submit'>
</form>