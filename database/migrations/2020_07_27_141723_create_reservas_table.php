<?php
use App\Models\Reserva;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('cliente_id')->unsigned();
            $table->foreign('cliente_id')->references('id')->on('clientes');

            $table->integer('tatuador_id')->unsigned();
            $table->foreign('tatuador_id')->references('id')->on('tatuadors');

            $table->integer('tatuaje_id')->unsigned();
            $table->foreign('tatuaje_id')->references('id')->on('tatuajes');

            $table->string('codigo_de_seguridad');
            $table->dateTime('fecha');



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
        Schema::dropIfExists('reservas');
    }
}
