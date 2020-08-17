<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProvinciaToEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('empresas', function (Blueprint $table) {
            $table->string('apellidos');
            $table->string('domicilio');
            $table->string('numero_empleados');
            $table->string('telefono');
            $table->unsignedBigInteger('provincia_id')->unsigned();
            $table->unsignedBigInteger('user_id')->unsigned();



            $table->foreign('provincia_id')->references('id')->on('provincia')
            ->onDelete('cascade');

            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('empresas');
        Schema::enableForeignKeyConstraints();
    }
}
