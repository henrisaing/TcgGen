$(document).ready(function(){
  updateInputs();
});

// takes text/information on card and transfers it to a hidden form field
// loops every 1second
function updateInputs(){
  // clears #card-fields
  $('#card-fields').html(' ');

  $('.hotswaptext').each(function(){
    // if card element isnt a textarea currently
    element = $(this).attr('element');
    if($(this).find("textarea").length == 0){
        $('#card-fields').append('<input type="hidden" name="'+element+'" value="'+$(this).html().trim().replace(/\"/g,'&quot;').replace(/\</g,'&#60;').replace(/\>/g,'&gt;')+'">');

        // converts [IMG]url into <img>
        if ($(this).html().trim().search(/\[IMG\]/i) !== -1) {
          $(this).html('<img src="'+$(this).html().trim().replace(/\[IMG\]/i,'')+'">');
        }
    }else{
      // logs textareas
      $('#card-fields').append('<input type="hidden" name="'+element+'" value="'+$(this).find('textarea').val().trim().replace(/\"/g,'&quot;').replace(/\</g,'&#60;').replace(/\>/g,'&gt;')+'">');
    }
  });

  setTimeout(function(){updateInputs()}, 500);
}



// intercepts [enter], stops form submission, adds new line
$(window).keydown(function(event){
  if(event.keyCode == 13) {
    event.preventDefault();
    var before = document.activeElement.value.substring(0, document.activeElement.selectionStart);
    var after = document.activeElement.value.substring(document.activeElement.selectionStart, document.activeElement.value.length);
    document.activeElement.value = before + "\n" + after;
    document.activeElement.selectionEnd = parseInt(before.length)+1;
    document.activeElement.rows += 1;

    return false;
  }

  if(event.keyCode == 27){
    document.activeElement.blur();

    return false;
  }
});