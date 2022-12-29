<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapaController extends Controller
{
    public function index()
    {

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "https://api.openrouteservice.org/v2/directions/driving-car?api_key=5b3ce3597851110001cf6248f8ef9b5247234db29921485f3af80a4a&start=8.681495,49.41461&end=8.687872,49.420318");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Accept: application/json, application/geo+json, application/gpx+xml, img/png; charset=utf-8"
        ));

        $response = curl_exec($ch);
        curl_close($ch);



        return view('mapa3', compact('response'));
    }

    public function index1()
    {
        $ch = curl_init();
        $puntos =[[8.681495,49.41461],[8.686507,49.41943],[8.687872,49.420318]];
        $query = [
            'coordinates' => $puntos,
            'instructions_format' => 'html',
            'language' => 'es',
        ];
        $header =[
            "Accept: application/json, application/geo+json, application/gpx+xml, img/png; charset=utf-8",
            "Authorization: 5b3ce3597851110001cf6248f8ef9b5247234db29921485f3af80a4a",
            "Content-Type: application/json; charset=utf-8"
        ];

        curl_setopt($ch, CURLOPT_URL, "https://api.openrouteservice.org/v2/directions/driving-car/geojson");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);

        curl_setopt($ch, CURLOPT_POST, TRUE);

        curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($query));

        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

        $response = curl_exec($ch);

        //leer las estaciones de la ruta que se quiere calcular
        $estaciones =[
            "estaciones" =>[

            '0' => ['Estacion1','direccion1'] ,
            '1' =>['Estacion2','direccion2'] ,
            '2' =>[ 'Estacion3' , 'direccion3']


        ]];


        //convertir a los datos devuelto a un array para añadir el campo nuevo de puntos de control de la ruta
        $response_to_array = json_decode($response, true);

        //añadir las estaciones a la respuesta de OpenRouteService
        $response_to_array['features'][0]= $response_to_array['features'][0]+ $estaciones;
        //convertir nuevamente la respuesta al formato GeoJson
        $response = json_encode($response_to_array);
        //cerrar la conexion
        curl_close($ch);

        return view('mapa', compact('response'));
    }
}
