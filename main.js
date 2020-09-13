//Select element function
const selectElement = function (element){
  return document.querySelector(element);
};

let menuToggler = selectElement('.menu-toggle');
let body = selectElement('body');

menuToggler.addEventListener('click', function(){
  body.classList.toggle('open');
});

//Active class function

function myFunction(e) {
  var elems = document.querySelector(".active");
  if(elems !==null){
   elems.classList.remove("active");
  }
 e.target.className = "active";
}


// Scroll reveal
window.sr = ScrollReveal();

sr.reveal('.animate-left',{
  origin: 'left',
  duration: 1000,
  distance: '25rem',
  delay: 300
});

sr.reveal('.animate-right',{
  origin: 'right',
  duration: 1000,
  distance: '25rem',
  delay: 600
});

sr.reveal('.animate-top',{
  origin: 'top',
  duration: 1000,
  distance: '25rem',
  delay: 600
});

sr.reveal('.animate-bottom',{
  origin: 'bottom',
  duration: 1000,
  distance: '25rem',
  delay: 600
});