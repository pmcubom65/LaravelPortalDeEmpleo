<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contactos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('oferta_trabajador_id');
            $table->datetime('dia');
            $table->time('hora');
            $table->float('latitud')->nullable();
            $table->float('longitud')->nullable();

            $table->unique('oferta_trabajador_id');

            $table->foreign('oferta_trabajador_id')
            ->references('id')
            ->on('oferta_trabajador')
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
        Schema::dropIfExists('contactos');
    }
}
