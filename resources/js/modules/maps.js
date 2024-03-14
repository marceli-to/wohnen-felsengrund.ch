const initMap = () => {
  mapboxgl.accessToken = 'pk.eyJ1IjoibWFyY2VsaXRvb29vIiwiYSI6ImNrMHNsdmhwdjAzcjIzZ3BldTlqdWhnaWEifQ.EWZE383Tn4xBt0E5pSXh6Q';
  var map = new mapboxgl.Map({
      container: 'map',
      style: 'mapbox://styles/marcelitoooo/ck16ms7m51nlo1cmwnqrbjuyq?optimize=true',
      center: [8.518915948100124,47.363909484198],
      zoom: 13
  });
  map.addControl(new mapboxgl.NavigationControl());
  map.scrollZoom.disable();

  var geojson = {
    type: 'FeatureCollection',
    features: [{
      type: 'Feature',
      geometry: {
        type: 'Point',
        coordinates: [8.518915948100124,47.363909484198]
      },
      properties: {
        title: 'Nidum Sempach',
        description: 'Zürich'
      }
    }]
  };

  // add markers to map
  geojson.features.forEach(function(marker) {

  // create a HTML element for each feature
  var el = document.createElement('div');
  el.className = 'marker';

  // make a marker for each feature and add to the map
  new mapboxgl.Marker(el)
    .setLngLat(marker.geometry.coordinates)
    .addTo(map);
  });
};

const loadMapScript = () => {
  var script = document.createElement('script');
  script.src = 'https://api.mapbox.com/mapbox-gl-js/v1.3.1/mapbox-gl.js';
  script.async = true;
  document.head.appendChild(script);

  script.onload = () => {
    const mapEl = document.getElementById('map');
    if (mapEl !== null) {
      initMap();
    }
  }
}

loadMapScript();

// const isInViewport = (selector) => {
//   const mapEl = document.getElementById(selector);
//   if (mapEl === null) {
//     return;
//   }
//   const rect = mapEl.getBoundingClientRect();
//   const windowHeight = (window.innerHeight || document.documentElement.clientHeight);
//   const windowWidth = (window.innerWidth || document.documentElement.clientWidth);
//   const vertInView = (rect.top <= windowHeight) && ((rect.top + rect.height) >= 0);
//   const horInView = (rect.left <= windowWidth) && ((rect.left + rect.width) >= 0);
//   return (vertInView && horInView);
// };

// if (isInViewport('map')) {
//   loadMapScript();
// }

// const scrollEventHandler = () => {
//   if (isInViewport('map')) {
//     loadMapScript();
//     window.removeEventListener('scroll', scrollEventHandler);
//   }
// }
// window.addEventListener('scroll', scrollEventHandler);


