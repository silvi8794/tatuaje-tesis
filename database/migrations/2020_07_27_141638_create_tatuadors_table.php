<?php

use App\Models\Tatuador;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTatuadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tatuadors', function (Blueprint $table) {
            $table->increments('id');

            $table->string('dni',10)->unique();
            $table->string('nombre',30);
            $table->string('apellido',30);
            $table->string('email',30)->unique();
            $table->string('especialidad',70);
            $table->string('estado')->default(Tatuador::TATUADOR_NO_DISPONIBLE);

            $table->integer('sucursal_id')->unsigned();
            $table->foreign('sucursal_id')->references('id')->on('sucursals');

            $table->integer('localidad_id')->unsigned();
            $table->foreign('localidad_id')->references('id')->on('localidads');

             $table->integer('sexo_id')->unsigned();
             $table->foreign('sexo_id')->references('id')->on('sexos');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');




            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tatuadors');
    }
}
