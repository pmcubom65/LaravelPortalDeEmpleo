<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratosTable extends Migration
{
   
    public function up()
    {
        Schema::create('contratos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nombre');
        
           


        });
        DB::table('contratos')->insert(
            array(['nombre'=>
                 'Jornada Completa','created_at' => new DateTime('now'), 'updated_at' => new DateTime('now')],
                 ['nombre'=>
                 'Jornada Parcial','created_at' => new DateTime('now'), 'updated_at' => new DateTime('now')]));
        
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
