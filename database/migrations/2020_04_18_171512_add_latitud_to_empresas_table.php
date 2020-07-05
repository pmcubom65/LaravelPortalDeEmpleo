<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLatitudToEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('empresas', function (Blueprint $table) {
        
            $table->double('latitud', 4, 2);
            $table->double('longitud', 5, 2);
        });



        DB::table('empresas')->insert(
            array(['apellidos'=>
                 'Lopez Arteaga','created_at' => new DateTime('now'), 'updated_at' => new DateTime('now'),
                 'cif'=>'1111',
                 'nombre'=>'Alfredo',
                 'domicilio'=>'C/Molino',
                 'provincia_id'=>16,
                 'numero_empleados'=>'100',
                 'telefono'=>'664446',
                 'user_id'=>1,
                 'latitud'=>37.89155,
                 'longitud'=>-4.77275
                 ]
                ));


                DB::table('empresas')->insert(
                    array(['apellidos'=>
                         'Mateo Pardo','created_at' => new DateTime('now'), 'updated_at' => new DateTime('now'),
                         'cif'=>'2222',
                         'nombre'=>'Marta',
                         'domicilio'=>'C/Rosa',
                         'provincia_id'=>1,
                         'numero_empleados'=>'150',
                         'telefono'=>'774446',
                         'user_id'=>2,
                         'latitud'=>38.994,
                         'longitud'=>-1.85673
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
        Schema::table('empresas', function (Blueprint $table) {
            //
        });
    }
}
