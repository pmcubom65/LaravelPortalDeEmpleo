<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorias', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nombre')->unique();
            $table->text('descripcion');


        });

        DB::table('categorias')->delete();
        DB::table('categorias')->insert(
            array(['nombre'=>'Marketing','descripcion'=> 'Ventas de productos'],
            ['nombre'=>'Engineering','descripcion'=> 'Tecnologia'],
            ['nombre'=>'Training','descripcion'=> 'Formacion'],
            ['nombre'=>'Services','descripcion'=> 'Servicios'],
            ['nombre'=>'Legal','descripcion'=> 'Asesoramiento legal'],
            ['nombre'=>'Accounting','descripcion'=> 'Contabilidad'],
            ['nombre'=>'Sales','descripcion'=> 'Ventas'],
            ['nombre'=>'Research and Development','descripcion'=> 'I+D'],
            ['nombre'=>'Business Development','descripcion'=> 'Negocios'],
            ['nombre'=>'Human Resources','descripcion'=> 'RRHH'],
            ['nombre'=>'Support','descripcion'=> 'Soporte'], ['nombre'=>
                 'Programador en Java', 'descripcion'=>
                 'Programador en lenguaje de programación Java']));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('categorias');
        Schema::enableForeignKeyConstraints();
    }
}
