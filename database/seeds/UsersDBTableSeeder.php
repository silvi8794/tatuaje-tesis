<?php

use App\Models\Administrador;
use App\Models\Cliente;
use App\Models\Localidad;
use App\Models\Sexo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\DB;

class UsersDBTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //App\User::create([
        $userAdmin = App\User::create([
            'tipouser_id'       => 1,
            'admin'             => '-',
            'email'             =>  'admin@gmail.com',
            'password'          => Hash::make('12341234'),
            'verified'          => true,
        ]);
        $user = App\User::create([
            'tipouser_id'       => 3,
            'admin'             => '-',
            'email'             =>  'cliente@gmail.com',
            'password'          => Hash::make('12341234'),
            'verified'          => true,
        ]);
        $sexo = Sexo::first();
        $localidad = Localidad::first();

        $administrador = new Administrador();
        $administrador->dni = '11222333';
        $administrador->nombre = 'Admin';
        $administrador->apellido = 'Admin';
        $administrador->email = $userAdmin->email;
        $administrador->estado = 'Disponible';
        $administrador->localidad_id = $localidad->id;
        $administrador->user_id = $userAdmin->id;
        $administrador->sexo_id = $sexo->id;
        $administrador->save();

        $cliente = new Cliente();
        $cliente->dni = '33333333';
        $cliente->nombre = 'Nombre';
        $cliente->apellido = 'Apellido';
        $cliente->email = $user->email;
        $cliente->localidad_id = $localidad->id;
        $cliente->user_id = $user->id;
        $cliente->sexo_id = $sexo->id;
        $cliente->save();

        

    }
}
