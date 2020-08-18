<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProvinciaToTrabajadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('trabajadors', function (Blueprint $table) {
            $table->unsignedBigInteger('provincia_id')->unsigned();
         

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('trabajadors', function (Blueprint $table) {
            $table->dropColumn('provincia_id');
        });
    }
}
