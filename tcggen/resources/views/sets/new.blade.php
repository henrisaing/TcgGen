<form action="/sets/create">
  name <input type="text" name="name"> <br>

  image <textarea name="image"></textarea> <br>

  description <textarea name="description"></textarea> <br>

  public 
  <select name="public">
    <option value="public">public</option>
    <option value="private">private</option>
    <option value="shareable">shareable</option>
  </select> <br>
  <input type="submit" value="Create">
</form>