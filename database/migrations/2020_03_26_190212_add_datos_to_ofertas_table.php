<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDatosToOfertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ofertas', function (Blueprint $table) {
            //
        });

        DB::table('ofertas')->insert(
            array(['categoria_id'=>
                 3,'created_at' => new DateTime('now'), 'updated_at' => new DateTime('now'),
                 'contrato_id'=>2,
                 'descripcion'=>'Programador en Laravel con experiencia',
                 'titulo'=>'Programador en Laravel con experiencia',
                 'salario'=>20000,
                 'provincia_id'=>7,
                 'experiencia_id'=>3,
                 'empresa_id'=>1,
          
                 'proceso'=>1
                 ]
                ));


                DB::table('ofertas')->insert(
                    array(['categoria_id'=>
                         1,'created_at' => new DateTime('now'), 'updated_at' => new DateTime('now'),
                         'contrato_id'=>1,
                         'descripcion'=>'Programador en Vue',
                         'titulo'=>'Programador en Vue con experiencia',
                         'salario'=>20000,
                         'provincia_id'=>4,
                         'experiencia_id'=>3,
                         'empresa_id'=>2,
                
                         'proceso'=>1
                         ]
                        ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ofertas', function (Blueprint $table) {
            //
        });
    }
}
