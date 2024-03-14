const Iso = (function() {
  
  // OPTIONS AND VARIABLES
  const selectors = {
    body: 'body',
    apartment: '[data-apartment]',
    iso: '[data-iso]',
    isoItem: '[data-iso-item]',
    isoFloor: '[data-iso-floor]',
    hint: '[data-apartment-hint]',
  };

  // METHODS
  const initialize = function() {
    bind();
  };

  const bind = function() {

    // add a mouseover event listener to each isoFloor
    document.querySelectorAll(selectors.isoFloor).forEach(function(isoFloor) {
      isoFloor.addEventListener('mouseover', function() {
        hideFloor(isoFloor);
      });
      isoFloor.addEventListener('mouseleave', function() {
        showFloor(isoFloor);
      });
    }); 

    // add a mouseover event listener to each isoItem
    document.querySelectorAll(selectors.isoItem).forEach(function(isoItem) {
      isoItem.addEventListener('mouseover', function() {
        if (isoItem.dataset.isoItem != '') {
          highlightList(isoItem.dataset.isoItem);
          highlightIso(isoItem, false);
        }
      });
      isoItem.addEventListener('mouseleave', function() {
        if (isoItem.dataset.isoItem != '') {
          resetList(isoItem.dataset.isoItem);
          resetIso();
        }
      });
    });

    // add a mouseover event listener to each apartment
    document.querySelectorAll(selectors.apartment).forEach(function(apartment) {
      if (_isMobile()) {
        return;
      }
      apartment.addEventListener('mouseover', function() {
        listMouseOver(apartment);
      });
    });

    // add a mouseout event listener to each apartment
    document.querySelectorAll(selectors.apartment).forEach(function(apartment) {
      apartment.addEventListener('mouseleave', function() {
        listMouseOut(apartment);
      });
    });

    // add a touchstart event listener to each apartment
    document.querySelectorAll(selectors.apartment).forEach(function(apartment) {
      if (_isMobile()) {
        apartment.addEventListener('click', function() {
          listTouchStart(apartment);
        });
      }
    });
  };

  const listMouseOver = function(apartment) {
    const number = apartment.dataset.number;
    const isoItem = document.querySelector('[data-iso="lg"] [data-iso-item="' + number + '"]');
    highlightIso(isoItem);
  };

  const listTouchStart = function(apartment) {
    clearAll();
    const number = apartment.dataset.number;
    const isoItem = document.querySelector('[data-iso="sm"] [data-iso-item="' + number + '"]');
    highlightIso(isoItem);
  };

  const listMouseOut = function(apartment) {
    const number = apartment.dataset.number;
    const isoItem = document.querySelector('[data-iso="lg"] [data-iso-item="' + number + '"]');
    clear(isoItem);
  };

  const highlightList = (number) => {
    const apartments = document.querySelectorAll('[data-number="' + number + '"]');
    apartments.forEach(function(apartment) {
      apartment.classList.add('is-highlighted');
    });
  };

  const resetList = (number) => {
    const apartments = document.querySelectorAll('[data-number="' + number + '"]');
    apartments.forEach(function(apartment) {
      apartment.classList.remove('is-highlighted');
    });
  }

  const resetIso = function() {
    const isoItems = Array.from(document.querySelectorAll('[data-iso-item]'));
    isoItems.forEach(function (isoItem) {
      clear(isoItem);
    });
  };

  const hideFloor = (floor) =>  {
    // find all siblings of the parent <g> element that are after it
    const nextSiblings = getNextSiblings(floor);

    // add styles to translate the parent <g> elements siblings
    nextSiblings.forEach(function(sibling) {
      sibling.classList.add('is-up-lg')
    });
  };

  const showFloor = (floor) =>  {
    // find all siblings of the parent <g> element that are after it
    const nextSiblings = getNextSiblings(floor);

    // add styles to translate the parent <g> elements siblings
    nextSiblings.forEach(function(sibling) {
      sibling.classList.remove('is-up-lg')
    });
  };

  const highlightIso = function(item, moveSiblings = true) {
    if (item) {
      const number = item.dataset.isoItem;
      const apartment = document.querySelector('[data-number="' + number + '"]');
      if (!apartment) {
        return
      }

      const state = apartment.dataset.state;

      if (state == 'free') {
        item.classList.add('is-highlighted');
      }
      else {
        item.classList.add('is-highlighted');
        item.classList.add('not-available');
      }
      
      if (moveSiblings) {
        // Get the parent <g> element for the item
        const parent = item.parentElement;

        // find all siblings of the parent <g> element that are after it
        const nextSiblings = getNextSiblings(parent);

        // add styles to translate the parent <g> elements siblings
        nextSiblings.forEach(function(sibling) {
          sibling.classList.add('is-up')
        });

        // find all siblings of the parent <g> element that are before it
        const previousSiblings = getPreviousSiblings(parent);

        // add styles to translate the parent <g> element and all its siblings
        parent.classList.add('is-down')
        previousSiblings.forEach(function(sibling) {
          sibling.classList.add('is-down')
        });
      }
    }
  };

  const clear = function(item) {
    if (item) {
      item.classList.remove('is-highlighted');
      // Get the parent <g> element for the isoItem
      const parent = item.parentElement;

      // find all siblings (before and after) of the parent <g> element
      const siblings = getAllSiblings(parent);

      // remove all instances of the is-up and is-down classes
      parent.classList.remove('is-up');
      parent.classList.remove('is-down');
      siblings.forEach(function(sibling) {
        sibling.classList.remove('is-up');
        sibling.classList.remove('is-down');
      });
    }
  };

  const clearAll = function() {
    const isoItems = Array.from(document.querySelectorAll('[data-iso-item]'));
    isoItems.forEach(function (isoItem) {
      clear(isoItem);
    });
  };

  const getNextSiblings = (parent) => {
    const siblings = [];
    let nextSibling = parent.nextElementSibling;
    while (nextSibling) {
      siblings.push(nextSibling);
      nextSibling = nextSibling.nextElementSibling;
    }
    return siblings;
  };

  const getPreviousSiblings = (parent) => {
    const previousSiblings = [];
    let previousSibling = parent.previousElementSibling;
    while (previousSibling) {
      previousSiblings.push(previousSibling);
      previousSibling = previousSibling.previousElementSibling;
    }
    return previousSiblings;
  };

  const getAllSiblings = (parent) => {
    const siblings = [];
    let nextSibling = parent.nextElementSibling;
    while (nextSibling) {
      siblings.push(nextSibling);
      nextSibling = nextSibling.nextElementSibling;
    }
    let previousSibling = parent.previousElementSibling;
    while (previousSibling) {
      siblings.push(previousSibling);
      previousSibling = previousSibling.previousElementSibling;
    }
    return siblings;
  };

  const _isMobile = function() {
    return (window.matchMedia('(max-width: 700px)').matches || window.innerWidth <= 700) && ('ontouchstart' in window || navigator.maxTouchPoints);
  };

  // RETURN PUBLIC METHODS
  return {
    init: initialize,
    clearAll: clearAll,
  };
})();

// Initialize
Iso.init();

export default Iso;