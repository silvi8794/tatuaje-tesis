<?php

use Illuminate\Database\Seeder;
use App\Models\Sucursal;
use App\Models\Localidad;

class SucursalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $localidad = Localidad::find(2);
        Sucursal::create([
            'nombre'            => 'Hilikus',
            'direccion'         => 'Buenos aires 8833',
            'horario_inicio'    => '08:00',
            'horario_fin'       => '21:00',
            'localidad_id'      => $localidad->id,
        ]);
        $localidad = Localidad::find(1);
        Sucursal::create([
            'nombre'            => 'Fenicius',
            'direccion'         => 'Lavalle 333',
            'horario_inicio'    => '08:00',
            'horario_fin'       => '21:00',
            'localidad_id'      => $localidad->id,
        ]);
    }
}
