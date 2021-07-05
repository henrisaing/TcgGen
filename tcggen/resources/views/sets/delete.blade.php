<!-- resource view: sets.delete -->
<div id="popup-form">
<form action="/set/<?=$set->id?>/delete" method="post">
  {{csrf_field()}}
  {{method_field('delete')}}
  Are you sure you want to delete [<?=$set->name?>]?
  <br><br>
  <button type="submit">DELETE</button>
</form>
</div>