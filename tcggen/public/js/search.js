const search = document.querySelector('#search');
const cards = document.querySelectorAll('.card');
search.addEventListener('input', (event) => {
  console.log(search.value)
  cards.forEach(function(card){
        card.style.display = 'inline-block';
    });
  // console.log(cards)
  if(search.value != ""){
    cards.forEach(function(card){
      console.log(nodeToString(card))
      if (nodeToString(card).replace(/\(|\)/g, '').search(new RegExp(search.value.replace(/\(|\)/g, ''), 'i')) == -1){
        card.style.display = 'none';
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