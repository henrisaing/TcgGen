<div id="popup-form">
  <form action="/deck/<?=$deck->id?>/delete" method="post">
    {{csrf_field()}}
    {{method_field('delete')}}
      Are you sure you want to delete [<?=$deck->name?>]?
    <br><br>
    <button type="submit">DELETE</button>
  </form>
</div>