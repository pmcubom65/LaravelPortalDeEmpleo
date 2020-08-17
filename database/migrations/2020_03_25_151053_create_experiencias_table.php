<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExperienciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        if(!Schema::hasTable('experiencias')){
        Schema::create('experiencias', function (Blueprint $table) {
            $table->id()->start_from(0);
            $table->timestamps();
            $table->string('nombre');
       


        });
        DB::table('experiencias')->insert(
            array(['nombre'=>
                 'Sin Experiencia','created_at' => new DateTime('now'), 'updated_at' => new DateTime('now')],
                 ['nombre'=>
                 '1 año','created_at' => new DateTime('now'), 'updated_at' => new DateTime('now')],
                 ['nombre'=>
                 '2 años','created_at' => new DateTime('now'), 'updated_at' => new DateTime('now')],
                 ['nombre'=>
                 '3 años','created_at' => new DateTime('now'), 'updated_at' => new DateTime('now')],
                 ['nombre'=>
                 'mas de 3','created_at' => new DateTime('now'), 'updated_at' => new DateTime('now')]));
    }
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
