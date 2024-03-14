import CtaButton from '../cta.js';

const Cart = (function() {
  
  // OPTIONS AND VARIABLES
  const selectors = {
    body: 'body',
    apartment: '[data-apartment]',
    isoItem: '[data-iso-item]',
    table: '[data-cart-table] table tbody',
    cart: '[data-cart]',
    btns: {
      clear: '[data-cart-clear]',
      hide: '[data-cart-hide]',
      toggle: '[data-cart-toggle]',
      remove: '[data-cart-remove-item]',
    }
  };

  const cartType = document.querySelector(selectors.cart) ? document.querySelector(selectors.cart).dataset.cart : null;


  // METHODS
  const initialize = function() {
    if (!_isMobile()) {
      bind();
    }
  };

  const bind = function() {

    // load cart from local storage
    load();

    // add click event for apartment
    document.querySelectorAll(selectors.apartment).forEach((apartment) => {
      apartment.addEventListener('click', function(e) {
        if (e.target.tagName != 'TD' || apartment.dataset.state == 'rented') return;
        add(apartment);
      });
    });

    // add click event for iso
    document.querySelectorAll(selectors.isoItem).forEach((isoItem) => {
      isoItem.addEventListener('click', function() {
        if (isoItem.dataset.isoItem != '') {
          const tables = document.querySelectorAll('table[data-apartments]');
          
          // find apartment in tables
          let apartment = null;
          tables.forEach((table) => {
            const apartmentInTable = table.querySelector(`tr[data-number="${isoItem.dataset.isoItem}"]`);
            if (apartmentInTable) {
              apartment = apartmentInTable;
            }
          });
          if (apartment) {
            add(apartment)
          }
        }
      });
    });

    // add click event for clear button
    if (document.querySelector(selectors.btns.clear)) {
      document.querySelector(selectors.btns.clear).addEventListener('click', function() {
        clear();
      });
    }

    // add click event for hide button
    if (document.querySelector(selectors.btns.hide)) {
      document.querySelectorAll(selectors.btns.hide).forEach((btn) => {
        btn.addEventListener('click', function() {
          toggle();
        });
      });
    }

    // add click event for toggle button
    if (document.querySelector(selectors.btns.toggle)) {
      document.querySelector(selectors.btns.toggle).addEventListener('click', function() {
        toggle();
      });
    }

    // add click event for remove button
    if (document.querySelector(selectors.btns.remove)) {
      document.querySelectorAll(selectors.btns.remove).forEach((btn) => {
        btn.addEventListener('click', function() {
          remove(btn);
        });
      });
    }

  };

  const add = (apartment) => {

    // only apartments with state 'free' can be added to cart
    if (apartment.dataset.state != 'free') return;

    // clone apartment and add to cart if not already there
    const apartmentClone = apartment.cloneNode(true);
    const table = document.querySelector(selectors.table);

    // check for existing row in table and abort if found
    if (table.querySelector(`tr[data-number="${apartment.dataset.number}"]`)) {
      show();
      return;
    }

    // remove classes
    apartmentClone.classList.remove(
      'hover:cursor-pointer',
      'hover:bg-olive',
      'hover:bg-opacity-20',
      'transition-all',
      'is-highlighted'
    );

    // remove data attribute
    apartmentClone.removeAttribute('data-apartment');

    // add a td with a remove link at the end
    const td = document.createElement('td');
    td.classList.add('!text-right', '!pr-0');

    const removeLink = document.createElement('a');
    removeLink.classList.add(
      'text-xs', 
      'hover:underline', 
      'hover:underline-offset-2', 
      'hover:decoration-1'
    );
    removeLink.setAttribute('href', 'javascript:;');
    removeLink.setAttribute('data-cart-remove-item', apartment.dataset.number);
    removeLink.innerHTML = 'Entfernen';

    // add event listener to remove link
    removeLink.addEventListener('click', function() {
      remove(this);
    });

    td.appendChild(removeLink);
    apartmentClone.appendChild(td);

    // add clone to table
    table.appendChild(apartmentClone);

    // save clone in local storage
    save(apartmentClone);

    CtaButton.hide();
    show();
  };

  const clear = () => {
    const table = document.querySelector(selectors.table);
    table.innerHTML = '';
    localStorage.removeItem(cartType);
    CtaButton.show();
    hide();
  };

  const remove = (btn) => {
    const table = document.querySelector(selectors.table);
    const number = btn.dataset.cartRemoveItem;
    table.querySelector(`tr[data-number="${number}"]`).remove();
    localStorage.removeItem(cartType);
    const cart = table.querySelectorAll('tr');
    cart.forEach((item) => {
      save(item);
    });
    if (cart.length == 0) {
      CtaButton.show();
      hide();
    }
  };

  const show = (minimize = false) => {
    const cart = document.querySelector(selectors.cart);
    cart.classList.remove('hidden');
    cart.classList.remove('is-minimized');
    if (minimize) {
      cart.classList.add('is-minimized');
    }
  };

  const hide = () => {
    const cart = document.querySelector(selectors.cart);
    cart.classList.add('is-minimized');
    cart.classList.add('hidden');
  };

  const toggle = () => {
    const cart = document.querySelector(selectors.cart);
    cart.classList.toggle('is-minimized');
  };

  const load = () => {
    const cart = JSON.parse(localStorage.getItem(cartType)) || [];
    const table = document.querySelector(selectors.table);
    cart.forEach((item) => {
      table.innerHTML += item;
    });

    // show cart if not empty
    if (cart.length > 0) {
      CtaButton.hide();
      show(true);
    }
  }

  const save = (item) => {
    let cart = JSON.parse(localStorage.getItem(cartType)) || [];
    cart.push(item.outerHTML);
    localStorage.setItem(cartType, JSON.stringify(cart));
  };

  const _isMobile = function() {
    return (window.matchMedia('(max-width: 700px)').matches || window.innerWidth <= 700) && ('ontouchstart' in window || navigator.maxTouchPoints);
  };

  // RETURN PUBLIC METHODS
  return {
    init: initialize,
  };
})();

// Initialize
Cart.init();
