<?php


use App\Models\Sexo;
use App\Models\Categoria;
use App\Models\Lugar;
use App\Models\TipoUser;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipousers')->insert([
            'nombre' => 'admin'
        ]);
        DB::table('tipousers')->insert([
            'nombre' => 'tatuador'
        ]);
        DB::table('tipousers')->insert([
            'nombre' => 'cliente'
        ]);

        DB::table('sexos')->insert([
            'nombre' => 'Femenino'
        ]);
        DB::table('sexos')->insert([
            'nombre' => 'Masculino'
        ]);

        DB::table('categorias')->insert([
            'nombre' => 'Acuarelados'
        ]);
        DB::table('categorias')->insert([
            'nombre' => 'ByN'
        ]);

        DB::table('lugars')->insert([
            'nombre' => 'Brazo'
        ]);
        DB::table('lugars')->insert([
            'nombre' => 'Pecho'
        ]);
        DB::table('lugars')->insert([
            'nombre' => 'Espalda'
        ]);

        $this->call(LocalidadSeeder::class);
        $this->call(SucursalSeeder::class);
        $this->call(UsersDBTableSeeder::class);
    }
}
