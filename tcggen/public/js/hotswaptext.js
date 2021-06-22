// TO USE
// either add 'hotswaptext' class to elements u want to swap text for
// or specify element in the html body using var hotswaptext
// eg. <script type="text/javascript">var hotswaptext = ".hotswaptext";</script> 

$(document).ready(function(){
// checks to see if hotswaptext var is initialized in html body
// if not, sets to default
  if(typeof hotswaptext == 'undefined'){var hotswaptext=".hotswaptext";}

// on click
// check to see if element has an textarea already
// if not, create input
// if true, do nothing
  $(hotswaptext).on("click",function(){
    var target = $(this);
    if(target.find("textarea").length == 0){
      target.html("<textarea>"+target.html().trim()+"</textarea>");
      $(hotswaptext+" textarea").focus();
    }
  });
  // $(hotswaptext).on("click",function(){
  //   var target = $(this);
  //   if(target.find("input").length == 0){
  //     target.html("<input type='text' name='' value='"+target.html().trim()+"' width='"+target.html().length+"'>");
  //     $(hotswaptext+" input").focus();
  //   }
  // });


// on focusout
// loops through all hotswap elements
// replaces textarea with regular text
// SUPER UGLY
  $(document).on("focusout", hotswaptext+" textarea", function(){
    $(hotswaptext).each(function(){
      var target = $(this);
      if(target.find("textarea").length > 0){
        // checks input str length
        // sets target html to input value
        // sets to blank space if empty
        if(target.find("textarea").val().trim().length > 0){
          $(target).html(target.find("textarea").val().trim());
        }else{
          $(target).html('&nbsp;&nbsp;&nbsp;');
        }

      }
    });
  });
  // $(document).on("focusout", hotswaptext+" input", function(){
  //   $(hotswaptext).each(function(){
  //     var target = $(this);
  //     if(target.find("input").length > 0){
  //       // checks input str length
  //       // sets target html to input value
  //       // sets to blank space if empty
  //       if(target.find("input").val().trim().length > 0){
  //         $(target).html(target.find("input").val().trim());
  //       }else{
  //         $(target).html('&nbsp;&nbsp;&nbsp;');
  //       }

  //     }
  //   });
  // });

 });

