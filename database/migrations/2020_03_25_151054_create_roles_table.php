<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('roles')){
        Schema::create('roles', function (Blueprint $table) {
            $table->id()->start_from(0);
            $table->timestamps();
            $table->string('nombre');
        });
       


     //   DB::statement('SET FOREIGN_KEY_CHECKS = 0');
            // Insert some stuff
    DB::table('roles')->insert(
        array(
            [
            'nombre' => 'trabajador'],
            [
            'nombre' => 'empresa']
        )
    );
  


        }

    }








    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      
      //  Schema::dropIfExists('roles');
  
    }
}
