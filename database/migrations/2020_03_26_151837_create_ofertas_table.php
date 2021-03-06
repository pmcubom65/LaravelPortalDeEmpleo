<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('ofertas')){
        Schema::create('ofertas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('ofertas');
        Schema::enableForeignKeyConstraints();
      
    }
}
