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
      target.html("<textarea rows="+lineCount(target.html().trim())+">"+target.html().trim().replace(/\&nbsp\;/ig,'').replace(/\<br\>/g, '\n')+"</textarea>");
      $(hotswaptext+" textarea").focus();
    }
  });


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
          $(target).html(target.find("textarea").val().trim().replace(/(?:\r\n|\r|\n)/g, '<br>'));
        }else{
          $(target).html('&nbsp;&nbsp;&nbsp;');
        }

      }
    });
  });
 });

// counts lines to set textarea rows
function lineCount(string){
  var lines = string.replace(/\&nbsp\;/g,'').split(/\r|\r\n|\n|\<br\>/);
  var totalLines = 1;
  var lineLength = 20;

  if(lines.length > 1){
    lines.forEach(function(line){
      if(line == ""){
        totalLines ++;
      }else{
        totalLines += (line.match(new RegExp('.{1,' + lineLength + '}', 'g'))).length;
      }
    });
  }

  return totalLines;
}