document.addEventListener('DOMContentLoaded', (event)=>{
  const lbLinks = document.querySelectorAll('button.lb-link');
  const lbAnchor = document.querySelectorAll('a.lb-link');
  const ajaxPost = document.querySelectorAll('.ajaxPost');

  // lightbox-link button clicks
  // gets contents of 'func' url
    // sets to lightboxcontent
  lbLinks.forEach(button => {
    button.addEventListener('click', event=>{
      event.preventDefault();
      openLightbox(button.getAttribute('func'));
    });
  });

  lbAnchor.forEach(anchor => {
    anchor.addEventListener('click', event=>{
      event.preventDefault();
      openLightbox(anchor.getAttribute('func'));
    });
  });

  // for adding/removing cards to a deck
  ajaxPost.forEach(anchor => {
    anchor.addEventListener('click', event=>{
      var func = anchor.getAttribute('func');
      // var count = ajaxGetEmpty(anchor.getAttribute('func'));
      $.get(func, function(data){
        document.getElementById('count').innerHTML = data;
      });
      // animate, wait 0.75s, remove animation
      anchor.parentNode.parentNode.classList.add('animate');
      
      if(func.split("/").pop() == 'remove'){
        setTimeout(function(){
          anchor.parentNode.parentNode.remove();
        }, 500);
      }else if(func.split("/").pop() == 'add'){
        setTimeout(function(){
          anchor.parentNode.parentNode.classList.remove('animate'); 
        }, 500);
      }
    });
  });

  // on user clicking shadowed area
  document.getElementById('dark-box').addEventListener('click', event => {
      event.stopPropagation();
      closeLightbox();
  });

  // on user clicking close button
  document.getElementById('lb-close').addEventListener('click', event => {
      event.stopPropagation();
      closeLightbox();
  });

  // on user clicking lightbox
  // just here to prevent clickthrough
  document.getElementById('light-box').addEventListener('click', event => {
      event.stopPropagation();
  });

  // if dom contains SHOWSETS link
  var showSets = document.getElementById('showSets');
  if (document.body.contains(showSets)){
    showSets.addEventListener('click', event=>{
      event.preventDefault();
      showSets.removeAttribute("href");
      showDecks.setAttribute('href', '');
      document.getElementById('sets').style.display = 'block';
      document.getElementById('decks').style.display = 'none';
    })
  }
  // if dom contains SHOWDECKS link
  var showDecks = document.getElementById('showDecks');
  if (document.body.contains(showDecks)){
    showDecks.addEventListener('click', event=>{
      event.preventDefault();
      showDecks.removeAttribute("href");
      showSets.setAttribute('href', '');
      document.getElementById('sets').style.display = 'none';
      document.getElementById('decks').style.display = 'block';
    })
  }
  

  const cards = document.querySelectorAll('.card');
  cards.forEach(card => {
    card.addEventListener('mouseover', event=>{
      if(card.contains(card.querySelector('.overlay'))){
        card.querySelector('.overlay').style.display = "block";
      }
    });
  });
  cards.forEach(card => {
    card.addEventListener('mouseout', event=>{
      if(card.contains(card.querySelector('.overlay'))){
        card.querySelector('.overlay').style.display = "none";
      }
    });
  });

});

function closeLightbox(){
  document.getElementById('dark-box').classList.add('fade-out');
  setTimeout(function(){
    document.getElementById('light-box-content').innerHTML ="";
    document.getElementById('dark-box').classList.remove('fade-out');
    document.getElementById('dark-box').style.display = "none";
  }, 900);
  
}

// opens link content in lightbox instead of window/tab
// uses func="url" instead of src
function openLightbox(func){
  $.get(func, function(data){
        document.getElementById('light-box-content').innerHTML = data;
      });
  document.getElementById('dark-box').style.display = "block";
  document.getElementById('light-box').classList.add('fade-in');
  setTimeout(function(){
    document.getElementById('light-box').classList.remove('fade-in');
  }, 1000);

}

// just does an ajax call to hit server
function ajaxGetEmpty(func){
  var count;
  $.get(func, function(data){
    console.log('data:'+data);
    count = parseInt(data);
    
  });
  console.log('count:'+count)
  return count;
}