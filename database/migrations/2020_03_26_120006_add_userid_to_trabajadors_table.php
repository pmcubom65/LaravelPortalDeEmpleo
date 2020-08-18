<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUseridToTrabajadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('trabajadors', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->unsigned();
            $table->string('dni');
            $table->string('direccion');
            $table->string('telefono');
            $table->datetime('fecha');

            $table->foreign('user_id')
            ->references('id')
            ->on('users')
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
        Schema::table('trabajadors', function (Blueprint $table) {
        
            $table->dropForeign(['user_id']);
         
            $table->dropColumn('dni');
            $table->dropColumn('direccion');
            $table->dropColumn('fecha');
            $table->dropColumn('telefono');
       
            $table->dropColumn('user_id');
        });
 
    }
}
