<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImagenToTrabajadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
     
        Schema::table('trabajadors', function (Blueprint $table) {
          
            $table->string('imagen')->nullable();
            
        });

        DB::table('trabajadors')->insert(
            array(['direccion'=>
                 'C/Viento 3','created_at' => new DateTime('now'), 'updated_at' => new DateTime('now'),
                 'dni'=>'5555',
                 'fecha'=>'1979-08-01',
                 'provincia_id'=>9,
                 'telefono'=>'666666666',
                 'user_id'=>3,
                 'imagen'=>'person1.jpg'
                 ]
                ));


                DB::table('trabajadors')->insert(
                    array(['direccion'=>
                         'C/Cerezo 3','created_at' => new DateTime('now'), 'updated_at' => new DateTime('now'),
                         'dni'=>'7777',
                         'fecha'=>'1987-09-01',
                         'provincia_id'=>11,
                         'telefono'=>'660066666',
                         'user_id'=>4,
                         'imagen'=>'person2.jpg'
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
        Schema::table('trabajadors', function (Blueprint $table) {
            $table->dropColumn('imagen');
        });
    }
}
