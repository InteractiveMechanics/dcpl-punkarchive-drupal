$( document ).ready(function() {

var map = L.map('map').setView([38.9, -77.015], 13);

L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://mapbox.com">Mapbox</a>',
    maxZoom: 18,
    id: 'cahdeemer.n4p0ijc0',
    accessToken: 'pk.eyJ1IjoiY2FoZGVlbWVyIiwiYSI6ImIwYzM3OGYyZTBmYmZlMWJmMzQ5OTNmZWRjMTA3NjNmIn0.4lMKKySybu846ym7-BNbYA'
}).addTo(map);

var dataSuccess = function(jsonData) {
    var layerOptions = {
        pointToLayer: function(featureData, latlng) {

        	var category = (featureData.properties.category);
        	
        	var greenIcon = L.icon({
		    iconUrl: 'themes/dcpunk/images/star-marker-green.png',
		    shadowUrl: 'themes/dcpunk/images/star-marker-shadow.png',

		    iconSize:     [20, 20], // size of the icon
		    shadowSize:   [20, 20], // size of the shadow
		    iconAnchor:   [10, 10], // point of the icon which will correspond to marker's location
		    //shadowAnchor: [12, 12],  // the same for the shadow
		    popupAnchor:  [0, 0] // point from which the popup should open relative to the iconAnchor
			});

			var blueIcon = L.icon({
		    iconUrl: 'themes/dcpunk/images/star-marker-blue.png',
		    shadowUrl: 'themes/dcpunk/images/star-marker-shadow.png',

		    iconSize:     [20, 20], // size of the icon
		    shadowSize:   [20, 20], // size of the shadow
		    iconAnchor:   [10, 10], // point of the icon which will correspond to marker's location
		    //shadowAnchor: [12, 12],  // the same for the shadow
		    popupAnchor:  [0, 0] // point from which the popup should open relative to the iconAnchor
			});

			var pinkIcon = L.icon({
		    iconUrl: 'themes/dcpunk/images/star-marker-pink.png',
		    shadowUrl: 'themes/dcpunk/images/star-marker-shadow.png',

		    iconSize:     [20, 20], // size of the icon
		    shadowSize:   [20, 20], // size of the shadow
		    iconAnchor:   [10, 10], // point of the icon which will correspond to marker's location
		    //shadowAnchor: [12, 12],  // the same for the shadow
		    popupAnchor:  [0, 0] // point from which the popup should open relative to the iconAnchor
			});

			var yellowIcon = L.icon({
		    iconUrl: 'themes/dcpunk/images/star-marker-yellow.png',
		    shadowUrl: 'themes/dcpunk/images/star-marker-shadow.png',

		    iconSize:     [20, 20], // size of the icon
		    shadowSize:   [20, 20], // size of the shadow
		    iconAnchor:   [10, 10], // point of the icon which will correspond to marker's location
		    //shadowAnchor: [12, 12],  // the same for the shadow
		    popupAnchor:  [0, 0] // point from which the popup should open relative to the iconAnchor
			});



            var getColor = function(x) {
            var icon = greenIcon;

			if (x == 'studio') {
			icon = yellowIcon;
			} else if (x == 'venue') {
			  icon = greenIcon;
			} else if (x == 'record store') {
			  icon = blueIcon;
			} else if (x == 'house') {
			  icon = pinkIcon;
			}

			return icon;
			},

			
			markerOptions = {
				icon: getColor(category),
			}

			var popupOptions = {
				maxWidth: 220,
			};

			var popupContent = "<span class='org-name'><a href='" + (featureData.properties.website) + "' target='_blank'>" + (featureData.properties.name);


			return L.marker(latlng, markerOptions).bindPopup(popupContent, popupOptions);
		}
	};

	var inventoryLayer = L.geoJson(jsonData, layerOptions);
	map.addLayer(inventoryLayer);

}; 

$.getJSON('themes/dcpunk/data/spaces_data.json', dataSuccess);

/* MAP MODAL */
/*
var map = L.map('overlayMap').setView([38.9, -77.015], 13);

L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://mapbox.com">Mapbox</a>',
    maxZoom: 18,
    id: 'cahdeemer.n4p0ijc0',
    accessToken: 'pk.eyJ1IjoiY2FoZGVlbWVyIiwiYSI6ImIwYzM3OGYyZTBmYmZlMWJmMzQ5OTNmZWRjMTA3NjNmIn0.4lMKKySybu846ym7-BNbYA'
}).addTo(map);


$('#myModal').on('shown.bs.modal', function(){
  setTimeout(function() {
    map.invalidateSize();
    //alert("Hey, your function is working!");
  }, 10);
 });*/



});