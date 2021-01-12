$(document).ready(function(){
  console.log('ready');

  $(".card-element").click(function(){
    var targetText = $(this).text();
    console.log(targetText);
  });
});