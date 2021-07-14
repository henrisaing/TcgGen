document.addEventListener('DOMContentLoaded', (event)=>{
  const lbLinks = document.querySelectorAll('button.lb-link');
  const lbAnchor = document.querySelectorAll('a.lb-link');

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


});

function closeLightbox(){
  document.getElementById('dark-box').style.display = "none";
}

// opens link content in lightbox instead of window/tab
// uses func="url" instead of src
function openLightbox(func){
  $.get(func, function(data){
        document.getElementById('light-box-content').innerHTML = data;
      });
  document.getElementById('dark-box').style.display = "block";
}