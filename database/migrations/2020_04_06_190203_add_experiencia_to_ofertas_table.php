<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExperienciaToOfertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ofertas', function (Blueprint $table) {
            $table->unsignedBigInteger('experiencia_id')->unsigned();
            $table->unsignedBigInteger('contrato_id')->unsigned();

            $table->foreign('experiencia_id')
            ->references('id')
            ->on('experiencias')
            ->onDelete('cascade');

            
            $table->foreign('contrato_id')
            ->references('id')
            ->on('contratos')
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
   
    }
}
