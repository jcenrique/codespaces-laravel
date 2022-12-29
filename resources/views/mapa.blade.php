<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <link rel="stylesheet" href="/vendor/orchid/css/orchid.css" />

    <link rel="stylesheet" href="/css/app.css" />


    <style>
        body{
            margin: 0px;
        }
        #map {
            height: 100vh;
        }

        .custom .leaflet-popup-tip,
.custom .leaflet-popup-content-wrapper {
    width: 300px;
    height: 300px;
    padding:0px;
    border-radius: 0px;

    /*Deleted top and bottom white sides!*/

}
.custom .leaflet-popup-tip,

.custom .leaflet-popup-content {
    width: 300px;

    margin:0px;
    border-radius: 0px;

    /*Deleted top and bottom white sides!*/

}

.leaflet-sidebar-content {

  background-color: rgba(255, 255, 255, 0.90);
}
.leaflet-sidebar-tabs > li.active, .leaflet-sidebar-tabs > ul > li.active {
        color: #fff;

            background-color: #556181; }

            .leaflet-sidebar-header {

  background-color: #556181; }



    </style>

     <script src="/js/app.js"></script>
    <script src="/js/leaflet-color-markers.js"></script>

</head>

<body>
    <div id="sidebar" class="leaflet-sidebar collapsed">

        @include('partials.sidebar')
    </div>



          <div  id="map"></div>








    <script type='module'>


        const node = document.getElementById("map")
/*Custom popup design*/


/*Custom options*/
var customOptions =
        {
        'maxWidth': '300',
        'className' : 'custom'
        }

var map = L.map('map').setView([49.41461,8.681495], 15);
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);


/* add a new panel */

var sidebar = L.control.sidebar({ container: 'sidebar' })
            .addTo(map)
            .open('home');

        // add panels dynamically to the sidebar
        // sidebar
        //     .addPanel({
        //         id:   'js-api',
        //         tab:  '<i class="fa fa-gear"></i>',
        //         title: 'Administración',
        //         pane: '<a class="pt-4 text-lg" href="/admin">Administración</a>',
        //     })
            // add a tab with a click callback, initially disabled

        // be notified when a panel is opened
        sidebar.on('content', function (ev) {
            switch (ev.id) {
                case 'autopan':
                sidebar.options.autopan = true;
                break;
                default:
                sidebar.options.autopan = false;
            }
        });



/* **************************************   */

            var datos = {!!$response!!}


            var  geojsonLayer =  L.geoJson(datos, {

                    style: function(feature) {
                        //console.log(feature);
                        return geojsonMarkerOptions;
                    },

                    onEachFeature: function (feature, layer) {
                        var way_points = feature.properties.way_points;


                        //poner marcadores de inicio y fin e intermedios
                        way_points.forEach((punto,key) => {


                        let customPopup_d = `@include("partials.estacion_view", ["estacion" => "`+  feature.estaciones[key][0]
                                                        +`" , "direccion" => "` +  feature.estaciones[key][1] +`", "id" => "` +  key +`" ])`



                        if(key==0){
                                return  new L.marker([feature.geometry.coordinates[punto][1], feature.geometry.coordinates[punto][0]],
                                    {icon:greenIcon}).addTo(map).bindPopup(customPopup_d,customOptions);
                        }else if(key==(way_points.length -1)){

                                return new L.marker([feature.geometry.coordinates[punto][1], feature.geometry.coordinates[punto][0]],
                                    {icon:redIcon}).addTo(map).bindPopup(customPopup_d,customOptions);
                        }else{
                                return new L.marker([feature.geometry.coordinates[punto][1], feature.geometry.coordinates[punto][0]],
                                    {icon:orangeIcon}).addTo(map).bindPopup(customPopup_d,customOptions);
                        }

                        //Poner etiquetas a los marcadores


                        });

                    }
                });

        map.addLayer(geojsonLayer);

        //centra el mapa en la ruta visible
        map.fitBounds(geojsonLayer.getBounds());

    </script>



</body>

</html>
