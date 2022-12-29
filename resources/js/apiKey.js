let apiKey ="5b3ce3597851110001cf6248f8ef9b5247234db29921485f3af80a4a";




var geojsonMarkerOptions = {
    radius: 8,
    fillColor: "#ff7800",
    color: "#ff5555",
    weight: 5,
    opacity: 0.9,
    fillOpacity: 0.8
};
var icono = new L.Icon( {
    iconUrl: '/images/vendor/leaflet/dist/marker-icon.png',
    shadowUrl: '/images/vendor/leaflet/dist/marker-shadow.png',

    iconSize:     [24, 38], // size of the icon
    shadowSize:   [35, 50], // size of the shadow
    iconAnchor:   [12, 38], // point of the icon which will correspond to marker's location
    shadowAnchor: [4, 62],  // the same for the shadow
    popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
});
var iconoIncio = new L.Icon( {
    iconUrl: '/images/vendor/leaflet/dist/marker-icon.png',
    shadowUrl: '/images/vendor/leaflet/dist/marker-shadow.png',

    iconSize:     [24, 38], // size of the icon
    shadowSize:   [35, 50], // size of the shadow
    iconAnchor:   [12, 38], // point of the icon which will correspond to marker's location
    shadowAnchor: [4, 62],  // the same for the shadow
    popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
});
var iconoFin = new L.Icon( {
    iconUrl: '/images/vendor/leaflet/dist/marker-icon.png',
    shadowUrl: '/images/vendor/leaflet/dist/marker-shadow.png',

    iconSize:     [24, 38], // size of the icon
    shadowSize:   [35, 50], // size of the shadow
    iconAnchor:   [12, 38], // point of the icon which will correspond to marker's location
    shadowAnchor: [4, 62],  // the same for the shadow
    popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
});
