document.addEventListener('DOMContentLoaded', (event)=>{
  const lbLinks = document.querySelectorAll('button.lb-link');

  // lightbox-link button clicks
  // gets contents of 'func' url
    // sets to lightboxcontent
  lbLinks.forEach(button => {
    button.addEventListener('click', event=>{
      openLightbox(button.getAttribute('func'));
      
    });
    
  });

  document.getElementById('dark-box').addEventListener('click', event => {
      event.stopPropagation();
      closeLightbox();
  });
  document.getElementById('lb-close').addEventListener('click', event => {
      event.stopPropagation();
      closeLightbox();
  });

  document.getElementById('light-box').addEventListener('click', event => {
      // console.log('light clicked');
      event.stopPropagation();
      console.log();
  });


});

function closeLightbox(){
  document.getElementById('dark-box').style.display = "none";
  // console.log('close');
}

function openLightbox(func){
  $.get(func, function(data){
        document.getElementById('light-box-content').innerHTML = data;
      });
  document.getElementById('dark-box').style.display = "block";
}