// input search box id
const search = document.querySelector('#search');

// input searchable items query
const items = document.querySelectorAll('.card');

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