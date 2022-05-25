<?php

use App\Models\Cliente;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('dni',10)->unique();
            $table->string('nombre',30);
            $table->string('apellido',40);
            $table->string('email',40)->unique();

            //$table->string('password');
           // $table->string('rememberToken');

            //por defecto usuario no verificado
        //    $table->string('verified')->default(User::usuario_no_verificado);
          //  $table->string('verification_token')->nullable();
            //$table->string('admin')->default(User::usuario_regular);


            $table->integer('localidad_id')->unsigned();
            $table->foreign('localidad_id')->references('id')->on('localidads');


            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->integer('sexo_id')->unsigned();
            $table->foreign('sexo_id')->references('id')->on('sexos');


            $table->timestamps();
            //AGREGARA UNA NUEVA FECHA QUE ES LA FECHA DE ELIMINACION DEL MODELO EN CASO DE QUE SE HAYA ELIMINADO EN CASO DE TABLA PIVOTS NO ES NECESARIO, SOLO EN LA RELACIONADA DIRECTAMENTE A UN MODELO
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
        Schema::dropIfExists('clientes');
    }
}
