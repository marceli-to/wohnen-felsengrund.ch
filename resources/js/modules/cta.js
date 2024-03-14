const CtaButton = (function() {

  const selectors = {
    button: '[data-cta]',
  };

  // Debounce function
  const debounce = (func, wait) => {
    let timeout;
    return function () {
      const context = this;
      const args = arguments;
      clearTimeout(timeout);
      timeout = setTimeout(() => {
        func.apply(context, args);
      }, wait);
    };
  };

  const init = () => {
    window.addEventListener('scroll', debounce(handleScroll, 50));
  };

  const handleScroll = () => {
    const button = document.querySelector(selectors.button);

    if (button) {
      const scrollPercentage = (window.scrollY / (document.documentElement.scrollHeight - window.innerHeight)) * 100;
      if (scrollPercentage <= 5) {
        button.classList.remove('opacity-100');
        button.classList.add('opacity-0');
      }
      else {
        button.classList.remove('opacity-0');
        button.classList.add('opacity-100');
      }
    }
  };

  const show = () => {
    const button = document.querySelector(selectors.button);
    if (button) {
      button.classList.remove('hidden');
    }
  };

  const hide = () => {
    const button = document.querySelector(selectors.button);
    if (button) {
      button.classList.add('hidden');
    }
  };

  return {
    init: init,
    show: show,
    hide: hide,
  };

})();

CtaButton.init();

export default CtaButton;

// Path: resources/js/modules/cta.js
