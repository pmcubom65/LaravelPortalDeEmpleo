<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProvinciaToOfertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

       
        Schema::table('ofertas', function (Blueprint $table) {
            $table->string('titulo');
            $table->unsignedBigInteger('provincia_id')->unsigned();
            $table->unsignedBigInteger('salario');
            $table->string('descripcion');
            $table->unsignedBigInteger('categoria_id')->unsigned();
            $table->unsignedBigInteger('empresa_id')->unsigned();

            $table->foreign('provincia_id')->references('id')->on('provincia')
            ->onDelete('cascade');


            $table->foreign('categoria_id')
            ->references('id')
            ->on('categorias')
            ->onDelete('cascade');

            
            $table->foreign('empresa_id')
            ->references('id')
            ->on('empresas')
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
        Schema::table('ofertas', function (Blueprint $table) {
            Schema::disableForeignKeyConstraints();
        //    $table->dropForeign(['provincia_id']);
            $table->dropForeign(['categoria_id']);
            $table->dropForeign(['empresa_id']);
       
         
            $table->dropColumn('titulo');
            $table->dropColumn('categoria_id');
            $table->dropColumn('empresa_id');
            $table->dropColumn('salario');
            $table->dropColumn('provincia_id');
            $table->dropColumn('descripcion');
            Schema::enableForeignKeyConstraints();
        });
    }
}
