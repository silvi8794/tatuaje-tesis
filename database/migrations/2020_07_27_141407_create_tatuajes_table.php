<?php

use App\Models\Tatuaje;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTatuajesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tatuajes', function (Blueprint $table) {
            $table->increments('id');

            //$table->integer('categoria_id')->unsigned();
            //$table->foreign('categoria_id')->references('id')->on('categorias');
            $table->string('fuente', 30)->nullable();
            $table->string('tamaño', 10);
            $table->string('nombre', 50);
            $table->string('imagen', 60);
            $table->string('descripcion', 200)->nullable();
            $table->double('precio_base')->nullable();

            //$table->string('estado')->default(Tatuaje::tatuaje_desactivado);


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
        Schema::dropIfExists('tatuajes');
    }
}
