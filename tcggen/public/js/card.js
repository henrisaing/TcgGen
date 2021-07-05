$(document).ready(function(){
  updateInputs();
});

// takes text/information on card and transfers it to a hidden form field
// loops every 1second
function updateInputs(){
  // clears #card-fields
  $('#card-fields').html(' ');

  $('.hotswaptext').each(function(){
    // if card element isnt an input currently
    if($(this).find("textarea").length == 0){
      element = $(this).attr('element');

      // if an image is detected
      // pass the img src as [IMG]src
      // if($(this).find("img").length > 0){
      //   $('#card-fields').append('<input type="hidden" name="'+element+'" value="[IMG]'+$(this).find('img').attr('src')+'">');
      // }else{
        //if sanitization is needed in frontend
        // $('#card-fields').append('<input type="text" name="'+element+'" value="'+$(this).html().toString().trim().replace(/</g,'&#60;').replace(/"/,'&quot;').replace(/\//g,'&#47;').replace(/>/g,'&gt;')+'">');
        $('#card-fields').append('<input type="hidden" name="'+element+'" value="'+$(this).html().trim().replace(/\"/g,'&quot;').replace(/\</g,'&#60;').replace(/\>/g,'&gt;')+'">');

        // converts [IMG]url into <img>
        if ($(this).html().trim().search(/\[IMG\]/i) !== -1) {
          $(this).html('<img src="'+$(this).html().trim().replace(/\[IMG\]/i,'')+'">');
        }
      // }
    }
  });

  setTimeout(function(){updateInputs()}, 750);
}



// intercepts [enter], stops form submission, blurs input
$(window).keydown(function(event){
  if(event.keyCode == 13) {
    event.preventDefault();
    document.activeElement.blur();
    return false;
  }
});