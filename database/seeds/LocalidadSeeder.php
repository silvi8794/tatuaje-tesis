<?php

use Illuminate\Database\Seeder;

use App\Models\Localidad;
use App\Models\Provincia;

class LocalidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $provCtes = Provincia::create([
            'nombre'    =>  'Corrientes',
        ]);
        $provChaco = Provincia::create([
            'nombre'    =>  'Chaco',
        ]);
        $provFormosa = Provincia::create([
            'nombre'    =>  'Formosa',
        ]);
        Localidad::create([
            'nombre'        => 'Corrientes',
            'provincia_id'  =>  $provCtes->id,
        ]);
        Localidad::create([
            'nombre'        => 'San Luis del Palmar',
            'provincia_id'  =>  $provCtes->id,
        ]);
        Localidad::create([
            'nombre'        => 'Resistencia',
            'provincia_id'  =>  $provChaco->id,
        ]);
        Localidad::create([
            'nombre'        => 'Barranqueras',
            'provincia_id'  =>  $provChaco->id,
        ]);
        Localidad::create([
            'nombre'        => 'Clorinda',
            'provincia_id'  =>  $provFormosa->id,
        ]);
        Localidad::create([
            'nombre'        => 'Formosa',
            'provincia_id'  =>  $provFormosa->id,
        ]);
    }
}
