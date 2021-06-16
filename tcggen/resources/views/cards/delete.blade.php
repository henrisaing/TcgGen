<form action="/card/<?=$card->id?>/delete" method="post">
  {{csrf_field()}}
  {{method_field('delete')}}
  Are you sure you want to delete [<?=$card->name?>]?
  <br><br>
  <button type="submit">DELETE</button>
</form>