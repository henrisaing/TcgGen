<div id="popup-form">

  <form action="/card/<?=$card->id?>/delete" method="post">
    {{csrf_field()}}
    {{method_field('delete')}}
    <p>
    Are you sure you want to delete [<?=$card->name?>]?
    </p>
    <br><br>
    <button type="submit">DELETE</button>
  </form>

</div>