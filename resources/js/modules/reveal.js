import ScrollReveal from 'scrollreveal';

(function () {

  const slideUp = {
    distance: '80px',
    origin: 'bottom',
    opacity: 0,
    duration: 300,
    delay: 240,
    easing: 'ease-in'
  };

  const sr = ScrollReveal();

  const slideUpItems = document.querySelectorAll('.js-sr-slide-up');
  sr.reveal(slideUpItems, slideUp);

  // const scaleIn = {
  //   scale: 0.98,
  //   duration: 320,
  // };

  // const scaleInItems = document.querySelectorAll('[data-reveal="scale-in"]');
  // sr.reveal(scaleInItems, scaleIn);
  
})();