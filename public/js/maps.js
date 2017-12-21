var a;
var ready = false;
var map;

var markers = [];

var startNavInput = document.getElementById('startNav');
var destinationNavInput = document.getElementById('destinationNav');

var startInput = document.getElementById('start');
var destinationInput = document.getElementById('destination');

var distanceInput = document.getElementById('distance');
var durationInput = document.getElementById('duration');

var distanceText = document.getElementById('distanceText');
var durationText = document.getElementById('durationText');

var directionsService;
var directionsDisplay;

var startAutocomplete;
var destinationAutocomplete;

var places

function initMap() {
  var styledMapType = new google.maps.StyledMapType(
    [
      {
        "elementType": "geometry",
        "stylers": [
          {
            "color": "#f5f5f5"
          }
        ]
      },
      {
        "elementType": "labels.icon",
        "stylers": [
          {
            "visibility": "off"
          }
        ]
      },
      {
        "elementType": "labels.text.fill",
        "stylers": [
          {
            "color": "#616161"
          }
        ]
      },
      {
        "elementType": "labels.text.stroke",
        "stylers": [
          {
            "color": "#f5f5f5"
          }
        ]
      },
      {
        "featureType": "administrative.land_parcel",
        "elementType": "labels.text.fill",
        "stylers": [
          {
            "color": "#bdbdbd"
          }
        ]
      },
      {
        "featureType": "poi",
        "elementType": "geometry",
        "stylers": [
          {
            "color": "#eeeeee"
          }
        ]
      },
      {
        "featureType": "poi",
        "elementType": "labels.text.fill",
        "stylers": [
          {
            "color": "#757575"
          }
        ]
      },
      {
        "featureType": "poi.park",
        "elementType": "geometry",
        "stylers": [
          {
            "color": "#e5e5e5"
          }
        ]
      },
      {
        "featureType": "poi.park",
        "elementType": "labels.text.fill",
        "stylers": [
          {
            "color": "#9e9e9e"
          }
        ]
      },
      {
        "featureType": "road",
        "elementType": "geometry",
        "stylers": [
          {
            "color": "#ffffff"
          }
        ]
      },
      {
        "featureType": "road.arterial",
        "elementType": "labels.text.fill",
        "stylers": [
          {
            "color": "#757575"
          }
        ]
      },
      {
        "featureType": "road.highway",
        "elementType": "geometry",
        "stylers": [
          {
            "color": "#dadada"
          }
        ]
      },
      {
        "featureType": "road.highway",
        "elementType": "labels.text.fill",
        "stylers": [
          {
            "color": "#616161"
          }
        ]
      },
      {
        "featureType": "road.local",
        "elementType": "labels.text.fill",
        "stylers": [
          {
            "color": "#9e9e9e"
          }
        ]
      },
      {
        "featureType": "transit.line",
        "elementType": "geometry",
        "stylers": [
          {
            "color": "#eadf1c"
          }
        ]
      },
      {
        "featureType": "transit.station",
        "elementType": "geometry",
        "stylers": [
          {
            "color": "#eeeeee"
          }
        ]
      },
      {
        "featureType": "water",
        "elementType": "geometry",
        "stylers": [
          {
            "color": "#c9c9c9"
          }
        ]
      },
      {
        "featureType": "water",
        "elementType": "labels.text.fill",
        "stylers": [
          {
            "color": "#9e9e9e"
          }
        ]
      }
    ],
    {name: 'Styled Map'});

  directionsService = new google.maps.DirectionsService;
  directionsDisplay = new google.maps.DirectionsRenderer({
      polylineOptions: {
        strokeColor: "#FEC606"
      },
      //suppressMarkers: true
    });
  map = new google.maps.Map(document.getElementById('map'), {
    zoom: 6,
    center: {lat: 46.227638, lng: 2.213749},
    /*mapTypeControlOptions: {
      mapTypeIds: ['roadmap', 'styled_map']
    }*/
    disableDefaultUI: true,
  });

  map.mapTypes.set('styled_map', styledMapType);
  map.setMapTypeId('styled_map');

  directionsDisplay.setMap(map);
/*
  var onChangeHandler = function() {
    calculateAndDisplayRoute(directionsService, directionsDisplay);
  };
/*  document.getElementById('start').addEventListener('change', onChangeHandler);
  document.getElementById('end').addEventListener('change', onChangeHandler);*/



  var options = {
    types: ['(cities)'],
    componentRestrictions: {country: "fr"}
  };


  //map.controls[google.maps.ControlPosition.TOP_LEFT].push(startInput);

  startNavAutocomplete = new google.maps.places.Autocomplete(startNavInput, options);

  destinationNavAutocomplete = new google.maps.places.Autocomplete(destinationNavInput, options);


  if(startInput != null) {
    startAutocomplete = new google.maps.places.Autocomplete(startInput, options);
    startAutocomplete.addListener('place_changed', onPlaceChanged);
  }
  if(destinationInput != null) {
    destinationAutocomplete = new google.maps.places.Autocomplete(destinationInput, options);
    destinationAutocomplete.addListener('place_changed', onPlaceChanged);
  }

  places = new google.maps.places.PlacesService(map);


  ready = true;

 /* if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var pos = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };

      map.setCenter(pos);
    }, function() {});
  }*/
}



function onPlaceChanged() {
  var start = startAutocomplete.getPlace();
  var destination = destinationAutocomplete.getPlace();

  if (start && start.geometry) {

    if(destination && destination.geometry) {
      calculateAndDisplayRoute(directionsService, directionsDisplay, start.formatted_address, destination.formatted_address, false);
    } else {
      /*document.getElementById('autocomplete').placeholder = 'Enter a city';*/
      map.panTo(start.geometry.location);
      map.setZoom(10);
    }
  } else {
    if(destination.geometry) {
      map.panTo(destination.geometry.location);
      map.setZoom(10);
    }
  }
    //search();
  // } else {
  //   /*document.getElementById('autocomplete').placeholder = 'Enter a city';*/
  //   // map.panTo(start.name);
  //   // map.setZoom(10);
  // }
}

function showTraject(start, destination) {
  if(!ready) {
    setTimeout(function() {
      showTraject(start, destination);
    }, 100);
    return;
  }
  calculateAndDisplayRoute(directionsService, directionsDisplay, start, destination, true);
}



function calculateAndDisplayRoute(directionsService, directionsDisplay, start, destination, complete) {
  var s, d;
  if (complete) {
    s = start + ", France";
    d = destination + ", France";
  } else {
    s = start;
    d = destination;
  }

  directionsService.route({
    origin: s,
    destination: d,
    travelMode: 'DRIVING'
  }, function(response, status) {
    if (status === 'OK') {
      // a = response;
      // console.log(response);
      directionsDisplay.setDirections(response);
      console.log(response);
      if(distanceInput != null) {
        var distance = response.routes[0].legs[0].distance;
        distanceInput.value = distance.value;
        distanceText.innerHTML = distance.text;
      }
      if(durationInput != null) {
        var duration = response.routes[0].legs[0].duration;
        durationInput.value = duration.value;
        durationText.innerHTML = duration.text;
      }
      // console.log(response.routes[0].legs[0].start_location);
      // addMarker(response.routes[0].legs[0].start_location, start);
    } else {
      //console.log(response);
      window.alert('Directions request failed due to ' + status);
    }
  });
}

function addMarker(location, text) {
  // Add the marker at the clicked location, and add the next-available label
  // from the array of alphabetical characters.
  var marker = new google.maps.Marker({
    position: location,
    label: text,
    map: map
  });
}
