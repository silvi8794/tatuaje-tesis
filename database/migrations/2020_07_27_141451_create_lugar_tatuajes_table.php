<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLugarTatuajesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lugar_tatuajes', function (Blueprint $table) {
            

            $table->integer('lugar_id')->unsigned();
            $table->foreign('lugar_id')->references('id')->on('lugars');

            $table->integer('tatuaje_id')->unsigned();
            $table->foreign('tatuaje_id')->references('id')->on('tatuajes');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lugar_tatuajes');
    }
}
