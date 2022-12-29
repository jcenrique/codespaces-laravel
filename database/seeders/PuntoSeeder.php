<?php

namespace Database\Seeders;

use App\Models\Coordenada;
use App\Models\Punto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PuntoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $punto1 = Punto::create([
            'name' => 'Hendaia',
            'direction' => 'General de Gaulle ',
            'instruction' => 'Parada de bus junto a la estación de de la SNCF sentido Donostia',
            'type' => 'Estación',

        ]);
        Coordenada::create([
            'punto_id' => $punto1->id,
            'point_imp' => [-1.7834812402725222, 43.35121321545145],
            'point_par' => [-1.7834812402725222, 43.35121321545145],

        ]);

        $punto2 =Punto::create([
            'name' => 'Ficoba',
            'direction' => 'Iparralde Hiribidea GI-636-H, Irún,PV,España',
            'instruction' => 'Rotonda Interior Ficoba junto a parada de taxis',
            'type' => 'Estación',

        ]);
        Coordenada::create([
            'punto_id' => $punto2->id,
            'point_imp' => [-1.7875528335571291,43.34791696068095 ],
            'point_par' =>  [-1.7875528335571291,43.34791696068095 ],

        ]);

        $punto3 = Punto::create([
            'name' => 'Irun Colon',
            'direction' => 'Irun Colón, Irún,PV,España',
            'instruction' => 'Frente al acceso de la estación en el Paseo Colon',
            'type' => 'Estación',

        ]);
        Coordenada::create([
            'punto_id' => $punto3->id,
            'point_imp' => [-1.7961359024047854, 43.340769909532604 ],
            'point_par' => [-1.7961359024047854, 43.340769909532604 ],

        ]);
    }
}
