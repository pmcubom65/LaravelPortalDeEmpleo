<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfertasTrabajadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oferta_trabajador', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('trabajador_id');
            $table->unsignedBigInteger('oferta_id');

            $table->foreign('trabajador_id')
            ->references('id')
            ->on('trabajadors')
            ->onDelete('cascade');

            $table->foreign('oferta_id')
            ->references('id')
            ->on('ofertas')
            ->onDelete('cascade');



            $table->unique(['trabajador_id','oferta_id'], 'unico');
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
        Schema::dropIfExists('oferta_trabajador');
        Schema::enableForeignKeyConstraints();
            
 
    }
}
