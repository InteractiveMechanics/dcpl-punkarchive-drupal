/*
Map tile was created using Mapbox; interactivity with the map relies on Leaflet.
 	
*/


var map = L.map('map').setView([38.9, -77.015], 13);

L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://mapbox.com">Mapbox</a>',
    maxZoom: 18,
    id: 'cahdeemer.pecnjfnp', 
    accessToken: 'pk.eyJ1IjoiY2FoZGVlbWVyIiwiYSI6ImIwYzM3OGYyZTBmYmZlMWJmMzQ5OTNmZWRjMTA3NjNmIn0.4lMKKySybu846ym7-BNbYA'
}).addTo(map);

var dataSuccess = function(jsonData) {
    var layerOptions = {
        pointToLayer: function(featureData, latlng) {
			console.log(latlng);
        	var category = (featureData.properties.category);
			
			markerOptions = {
				icon: new L.Icon.Default(),
			}

			var popupOptions = {
				minWidth: 80,
				maxWidth: 220,
			};
			
			var popupContent = "<span style='' class='org-name'>" + 
								"<h5 style='margin:0 0 -4px 0; color:black; font-size:21px'><strong>"+ (featureData.properties.title) +"</strong></h5>" +
								"<span style='color:#222; font-size:16px'>" + featureData.properties.category + "</span><br />" +
								"<a style='font-size:14px; color:#ff0000;' href='" + (featureData.properties.url) + "' target='_blank'>View More &raquo;</a>";


			return L.marker(latlng, markerOptions).bindPopup(popupContent, popupOptions);
		}
	};

	var inventoryLayer = L.geoJson(jsonData, layerOptions);
	map.addLayer(inventoryLayer);
	
	if(jsonData){
		if(jsonData.length == 1) {
			var mapItem = jsonData[0];
			console.log(mapItem.geometry.coordinates);
			map.setView([mapItem.geometry.coordinates[1], mapItem.geometry.coordinates[0]], 13);	
		}
	}

}; 


function callJson(jsonurl) {
	$.getJSON(jsonurl, dataSuccess);
}
