// TO USE
// either add 'search' id to element u want to use as page search/filtering
// or specify element in the html body using var search
// eg. <script type="text/javascript">var search = document.querySelector('#search');</script> 
// eg. items example <script type="text/javascript">var items = document.querySelectorAll('.card');</script> 

// input search box id
// can also be initialized in view
if(typeof search == 'undefined'){
  var search = document.querySelector('#search');
}

// input searchable items query
// can also be initialized in view
if(typeof items == 'undefined'){
  var items = document.querySelectorAll('.card');
}

// updates on user keyboard input
search.addEventListener('input', (event) => {
  
  // shows all items by default
  items.forEach(function(item){
        item.style.display = 'inline-block';
    });
  
  // if search is not empty
    // hides any items that dont match search query
  if(search.value != ""){
    items.forEach(function(item){
      //TODO make searches more robust, OR AND
      if (nodeToString(item).replace(/\(|\)/g, '').search(new RegExp(search.value.replace(/\(|\)/g, ''), 'i')) == -1){
        item.style.display = 'none';
      }
    });
  }
});

// from https://stackoverflow.com/questions/4239587/create-string-from-htmldivelement
function nodeToString ( node ) {
   var tmpNode = document.createElement( "div" );
   tmpNode.appendChild( node.cloneNode( true ) );
   var str = tmpNode.innerHTML;
   tmpNode = node = null; // prevent memory leaks in IE
   return str;
}


// from https://www.w3schools.com/howto/howto_js_navbar_sticky.asp
// When the user scrolls the page, execute myFunction
// window.onscroll = function() {stickSearch()};

// Get the navbar

// Get the offset position of the navbar
// var sticky = search.offsetTop;

// Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
// function stickSearch() {
//   console.log('scroll');
//   console.log(window.pageYOffset);
//   console.log(sticky);
//   if (window.pageYOffset >= sticky) {
//     search.style.position = "fixed";
//     search.style.top = "0";
//   } else {
//     search.style.position = "relative";
//     search.style.top = "0";
//   }
// }