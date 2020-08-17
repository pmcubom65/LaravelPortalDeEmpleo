<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRolidToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('rol_id')->unsigned();
            $table->foreign('rol_id')
            ->references('id')
            ->on('roles')
            ->onDelete('cascade');

        });

        DB::table('users')->insert(
            array(['email'=>
                 'empresa1@empresa1.es','created_at' => new DateTime('now'), 'updated_at' => new DateTime('now'),
                 'name'=>'Empresa 1',
                 'password'=>bcrypt('12345678'),
                 'rol_id'=>'2'
                 ]
                ));

                DB::table('users')->insert(
                    array(['email'=>
                         'empresa2@empresa2.es','created_at' => new DateTime('now'), 'updated_at' => new DateTime('now'),
                         'name'=>'Empresa 2',
                         'password'=>bcrypt('12345678'),
                         'rol_id'=>'2'
                         ]
                        ));
                        DB::table('users')->insert(
                            array(['email'=>
                                 'trabajador1@trabajador1.es','created_at' => new DateTime('now'), 'updated_at' => new DateTime('now'),
                                 'name'=>'Arturo Maroto',
                                 'password'=>bcrypt('12345678'),
                                 'rol_id'=>'1'
                                 ]
                                ));

                                DB::table('users')->insert(
                                    array(['email'=>
                                         'trabajador2@trabajador2.es','created_at' => new DateTime('now'), 'updated_at' => new DateTime('now'),
                                         'name'=>'Alberto de la Vega',
                                         'password'=>bcrypt('12345678'),
                                         'rol_id'=>'1'
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

     
    }
}