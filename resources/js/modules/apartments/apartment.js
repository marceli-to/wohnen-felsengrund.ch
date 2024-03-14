import Iso from './iso';

const ApartmentUi = (function () {

  // Selectors
  const selectors = {
    body: document.body,
    wrapper: '[data-apartment-show]',
    apartment: '[data-apartment]',
    btnClose: '[data-apartment-close]',
  };

  // Classes
  const classes = {
    hidden: 'hidden',
  };

  let selectedApartment = null;

  const initialize = () => {
    bind();
  };

  const bind = () => {
    // on touch start (item)  and show the wrapper
    document.querySelectorAll(selectors.apartment).forEach(function (element) {
      if ('ontouchstart' in window || navigator.maxTouchPoints) {
        element.addEventListener('click', function () {
          show(element);
        });
      }
    });

    // on click btnClose hide the wrapper if the button is in the document
    if (document.querySelector(selectors.btnClose)) {
      document.querySelector(selectors.btnClose).addEventListener('click', function () {
        hide();
      });
    }

    // on resize clear all, use debounce
    window.addEventListener('resize', debounce(function () {
      hide();
    }, 250));

    // on scroll clear all, use debounce
    window.addEventListener('scroll', debounce(function () {
      hide();
    }, 100));
  };

  const show = function (element) {
    clear();

    const elementData = element.dataset;

    if (selectedApartment == elementData.number) {
      hide();
      return;
    }

    selectedApartment = elementData.number;
    const wrapper = document.querySelector(selectors.wrapper);

    // Show the wrapper
    wrapper.classList.remove(classes.hidden);

    // Show the iso (data-apartment-iso[elementData.building])
    document.querySelector(`[data-apartment-iso="${elementData.building}"]`).classList.remove(classes.hidden);

    // Show the iso preview (data-apartment-iso-preview[elementData.building])
    // document.querySelector(`[data-apartment-iso-preview="${elementData.building}"]`).classList.remove(classes.hidden);

    // Add elementData to data-apartment-info innerHTML
    const objectDetailInfo = `${elementData.rooms}-Zimmerwohnung, ${elementData.detailFloor}, ${elementData.area} m²`;

    // create a link for elementData.form
    const objectDetailLink = `<a href="${elementData.form}" target="_blank" class="underline underline-offset-2 decoration-1">Anmeldeformular</a>`;

    // create a link for elementData.plan
    const objectDetailPlan = `<a href="${elementData.plan}" target="_blank" class="underline underline-offset-2 decoration-1">Grundriss</a>`;
    const objectDetail = `${objectDetailInfo}<div class="flex gap-x-16 mt-8">${objectDetailLink} ${objectDetailPlan}</div>`;

    document.querySelector('[data-apartment-number]').innerHTML = `${elementData.detailTitle}`;
    document.querySelector('[data-apartment-info]').innerHTML = objectDetail;
  };

  const hide = function () {
    const wrapper = document.querySelector(selectors.wrapper);
    if (wrapper) {
      wrapper.classList.add(classes.hidden);
    }
    clear();
    selectedApartment = null;
  };

  const clear = function () {

    const iso = Array.from(document.querySelectorAll('[data-apartment-iso]'));
    iso.forEach(function (element) {
      element.classList.add(classes.hidden);
    });

    const isoPreview = Array.from(document.querySelectorAll('[data-apartment-iso-preview]'));
    isoPreview.forEach(function (element) {
      element.classList.add(classes.hidden);
    });

  };

  // add a debounce function
  const debounce = (func, wait) => {
    let timeout;
    return function executedFunction(...args) {
      const later = () => {
        timeout = null;
        func(...args);
      };
      clearTimeout(timeout);
      timeout = setTimeout(later, wait);
    };
  };

  return {
    init: initialize,
  };
})();

// Initialize
ApartmentUi.init();
