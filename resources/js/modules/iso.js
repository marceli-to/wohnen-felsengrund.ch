const Iso = (function() {
  
  const selectors = {
    body: 'body',
    object: '[data-object]',
    iso: '[data-iso]',
  };

  const initialize = function() {
    bind();
  };

  const bind = function() {

    // Event listeners for 'selectors.object'
    document.querySelectorAll(selectors.object).forEach(function(object) {
      // Add mouseover event listener for selectors.object
      object.addEventListener('mouseover', function() {
        highlightIso(object);
      });
      // Add mouseout event listener for selectors.object
      object.addEventListener('mouseout', function() {
        clearIso();
      });
    });

    // Event listeners for 'selectors.iso'
    document.querySelectorAll(selectors.iso).forEach(function(iso) {
      // Add mouseover event listener for selectors.iso
      iso.addEventListener('mouseover', function() {
        hightlightRow(iso);
      });
      // Add mouseout event listener for selectors.iso
      iso.addEventListener('mouseout', function() {
        clearRow();
        clearIso();
      });
    });

  };

  const highlightIso = function(object) {
    // get data set
    const objectData = object.dataset;

    // get iso item data-iso="data.objectNumber" within data-iso-building="data.objectBuilding"
    const iso = document.querySelector('[data-iso-building="'+objectData.objectBuilding+'"] [data-iso="' + objectData.objectNumber + '"]');

    // add class '.is-active.is-available' to iso item if it exists
    if (!iso) return;
    iso.classList.add('is-active', objectData.objectState === 'available' ? 'is-available' : 'is-taken');
  };

  const hightlightRow = function(iso) {
    const isoData = iso.dataset;
    const object = document.querySelector('[data-object-number="'+isoData.iso+'"]');
    if (!object) return;
    const objectData = object.dataset;
    object.classList.add('is-active');
    iso.classList.add('is-active', objectData.objectState === 'available' ? 'is-available' : 'is-taken');
  };

  const clearIso = function() {
    document.querySelectorAll(selectors.iso).forEach(function(iso) {
      iso.classList.remove('is-active', 'is-available', 'is-taken');
    });
  };

  const clearRow = function() {
    document.querySelectorAll(selectors.object).forEach(function(object) {
      object.classList.remove('is-active');
    });
  };

  return {
    init: initialize,
  };
})();

// Initialize
Iso.init();
