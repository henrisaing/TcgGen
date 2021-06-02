$(document).ready(function(){
  console.log('ready Card');

  $('.hotswaptext').on('focusout', function(){
    // console.log($(this).html());
    // console.log($(this)[0].outerHTML);
    // console.log($(this)[0].innerHTML);
    // console.log($(this)[0]);
    // $('#card-fields').text($(this)[0].outerHTML);
  });

  updateInputs();
});

$(document).on('keypress','input',function(e){
    console.log(this.value + String.fromCharCode(e.which));
  });



function updateInputs(){
  // clears #card-fields
  $('#card-fields').html(' ');

  $('.hotswaptext').each(function(){
    // var classes = [];
    if($(this).find("input").length == 0){
      // console.log('no input on '+$(this).html());
      element = $(this).attr('element');
      console.log(element);
      console.log($(this).html().toString());

      if($(this).find("img").length > 0){
        console.log('image detected')
        $('#card-fields').append('<input type="text" name="'+element+'" value="[IMG]'+$(this).find('img').attr('src')+'">');
      }else{
        // $('#card-fields').append('<input type="text" name="'+element+'" value="'+$(this).html().toString().trim().replace(/</g,'&#60;').replace(/"/,'&quot;').replace(/\//g,'&#47;').replace(/>/g,'&gt;')+'">');
        $('#card-fields').append('<input type="text" name="'+element+'" value="'+$(this).html().trim()+'">');
      }
    }
// 
  });

  setTimeout(function(){updateInputs()}, 1000);
}