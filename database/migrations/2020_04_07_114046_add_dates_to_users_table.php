<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDatesToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
        DB::table('users')->delete();
        DB::table('users')->insert(
            array(['email'=>
                 'admin@admin.es','created_at' => new DateTime('now'), 'updated_at' => new DateTime('now'),
                 'name'=>'admin@admin.es',
                 'password'=>bcrypt('admin1234'),
                 'rol_id'=>'3'
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
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
