<link rel="stylesheet" href="//cdn.leafletjs.com/leaflet-0.7.3/leaflet.css">
<script src="//cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>

<div id="map" style= "height: 600px"></div>

<script>
var geojson = {
"type": "FeatureCollection",
"features": [
{ "type": "Feature", "id": 0, "properties": { "NAME": "Duluth Entertainment Convention Center (DECC)" }, "geometry": { "type": "Point", "coordinates": [49.41461,8.681495]}}
]
};

var map = L.map('map', {
	center: [49.41461,8.681495],
	zoom: 15
});

var OpenStreetMap_Mapnik = L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
	maxZoom: 19,
	attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>&#39'
}).addTo(map);

geojsonLayer = L.geoJson(geojson, {
    style: function(feature) {
        return {
        	color: "green"
        };
    },
    pointToLayer: function(feature, latlng) {
        return new L.CircleMarker(latlng, {
        	radius: 10,
        	fillOpacity: 0.85
        });
    },
    onEachFeature: function (feature, layer) {
       //console.log(feature);
        //layer.bindPopup(feature.properties.NAME);
    }

});

map.addLayer(geojsonLayer);
</script>
