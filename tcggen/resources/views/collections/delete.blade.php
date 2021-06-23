<div id="popup-form">
  <form action="/collection/<?=$collection->id?>/delete" method="post">
    {{csrf_field()}}
    {{method_field('delete')}}
    <p>
      Are you sure you want to delete [<?=$collection->name?>]?
    </p>
    <br><br>
    <button type="submit">DELETE</button>
  </form>
</div>