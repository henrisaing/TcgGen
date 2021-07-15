<!-- resources/views/collections/new.blade.php -->
<div id="popup-form">
<form action="/collection/store" method="post">
{{ csrf_field() }}

  name<input type="text" name="name"><br><br>

  image<textarea style="resize:none" name="image"></textarea>
  <br><br>

  description<textarea style="resize:none" name="description"></textarea>
  <br><br>
  <label for="public">
    <input type="radio" name="public" value="public" id="public">Public
  </label>

  <label for="private">
    <input type="radio" name="public" value="private" id="private" checked>Private
  </label>

  <label for="shareable">
    <input type="radio" name="public" value="shareable" id="shareable">Shareable
  </label>

  <input type="submit" name="submit" value='submit'>
</form>
</div>