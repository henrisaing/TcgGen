<!-- resources/views/collections/new.blade.php -->
<div id="popup-form">
<form action="/collection/store" method="post">
{{ csrf_field() }}

  <label class="under">name</label><br>
  <input type="text" name="name">
  <br>

  <label class="under">image</label><br>
  <textarea name="image" rows="3"></textarea>
  <br>

  <label class="under">description</label><br>
  <textarea name="description" rows="3"></textarea>
  <br><br>

  <input type="radio" name="public" value="public" id="public"><label for="public">public</label>  <br>
  <input type="radio" name="public" value="private" id="private" checked><label for="private">private</label>  <br>
  <input type="radio" name="public" value="shareable" id="shareable"><label for="shareable">shareable</label> 

  <br>
  <input type="submit" name="submit" value='submit'>
</form>
</div>