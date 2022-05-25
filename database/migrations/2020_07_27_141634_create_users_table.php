<?php

use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
             $table->increments('id');
             $table->string('email')->unique();
             $table->string('password');
             $table->rememberToken();
             $table->string('verified')->default(User::usuario_no_verificado);
             $table->string('verification_token')->nullable();
             $table->string('admin')->default(User::usuario_regular);
                       
            $table->integer('tipouser_id')->unsigned();
            $table->foreign('tipouser_id')->references('id')->on('tipousers');

             

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
        Schema::dropIfExists('users');
    }
}
