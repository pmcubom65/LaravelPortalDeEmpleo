<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expe', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('puesto')->nullable();
            $table->string('empresa')->nullable();
            $table->date('inicio')->nullable();
            $table->date('fin')->nullable();
            $table->unsignedBigInteger('user_id')->unsigned();
            $table->unsignedBigInteger('categoria_id')->unsigned()->default(1);
            $table->text('descripcion')->nullable();

            $table->foreign('categoria_id')
            ->references('id')
            ->on('categorias')
            ->onDelete('cascade');

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

        Schema::dropIfExists('expe');
      
    }
}
