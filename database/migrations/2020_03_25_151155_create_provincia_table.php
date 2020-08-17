<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvinciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('provincia')){
        Schema::create('provincia', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('region_name');

        });

      
        DB::table('provincia')->delete();
        DB::table('provincia')->insert(
            array(['region_name'=>
                 'Albacete','created_at' => new DateTime('now'), 'updated_at' => new DateTime('now')],[ 'region_name'=>
                 'Ciudad Real','created_at' => new DateTime('now'), 'updated_at' => new DateTime('now')],[ 'region_name'=>
                 'Cuenca','created_at' => new DateTime('now'), 'updated_at' => new DateTime('now')],[ 'region_name'=>
                 'Guadalajara','created_at' => new DateTime('now'), 'updated_at' => new DateTime('now')],[ 'region_name'=>
                 'Toledo','created_at' => new DateTime('now'), 'updated_at' => new DateTime('now')],[ 'region_name'=>
                 'Huesca','created_at' => new DateTime('now'), 'updated_at' => new DateTime('now')],[ 'region_name'=>
                 'Teruel','created_at' => new DateTime('now'), 'updated_at' => new DateTime('now')],[ 'region_name'=>
                  'Zaragoza','created_at' => new DateTime('now'), 'updated_at' => new DateTime('now')],[ 'region_name'=>
                  'Ceuta','created_at' => new DateTime('now'), 'updated_at' => new DateTime('now')],[ 'region_name'=>
                 'Madrid','created_at' => new DateTime('now'), 'updated_at' => new DateTime('now')],[ 'region_name'=>
                 'Murcia','created_at' => new DateTime('now'), 'updated_at' => new DateTime('now')],[ 'region_name'=>
                 'Melilla','created_at' => new DateTime('now'), 'updated_at' => new DateTime('now')],[ 'region_name'=>
                 'Navarra','created_at' => new DateTime('now'), 'updated_at' => new DateTime('now')],[ 'region_name'=>
                 'Almería','created_at' => new DateTime('now'), 'updated_at' => new DateTime('now')],[ 'region_name'=>
                 'Cádiz','created_at' => new DateTime('now'), 'updated_at' => new DateTime('now')],[ 'region_name'=>
                  'Córdoba','created_at' => new DateTime('now'), 'updated_at' => new DateTime('now')],[ 'region_name'=>
                 'Granada','created_at' => new DateTime('now'), 'updated_at' => new DateTime('now')],[ 'region_name'=>
                  'Huelva','created_at' => new DateTime('now'), 'updated_at' => new DateTime('now')],[ 'region_name'=>
                 'Jaén','created_at' => new DateTime('now'), 'updated_at' => new DateTime('now')],[ 'region_name'=>
                  'Málaga','created_at' => new DateTime('now'), 'updated_at' => new DateTime('now')],[ 'region_name'=>
                 'Sevilla','created_at' => new DateTime('now'), 'updated_at' => new DateTime('now')],[ 'region_name'=>
                   'Asturias','created_at' => new DateTime('now'), 'updated_at' => new DateTime('now')],[ 'region_name'=>
                   'Cantabria','created_at' => new DateTime('now'), 'updated_at' => new DateTime('now')],[ 'region_name'=>
                   'Ávila','created_at' => new DateTime('now'), 'updated_at' => new DateTime('now')],[ 'region_name'=>
                   'Burgos','created_at' => new DateTime('now'), 'updated_at' => new DateTime('now')],[ 'region_name'=>
                   'León','created_at' => new DateTime('now'), 'updated_at' => new DateTime('now')],[ 'region_name'=>
                   'Palencia','created_at' => new DateTime('now'), 'updated_at' => new DateTime('now')],[ 'region_name'=>
                   'Salamanca','created_at' => new DateTime('now'), 'updated_at' => new DateTime('now')],[ 'region_name'=>
                   'Segovia','created_at' => new DateTime('now'), 'updated_at' => new DateTime('now')],[ 'region_name'=>
                   'Soria','created_at' => new DateTime('now'), 'updated_at' => new DateTime('now')],[ 'region_name'=>
                   'Valladolid','created_at' => new DateTime('now'), 'updated_at' => new DateTime('now')],[ 'region_name'=>
                   'Zamora','created_at' => new DateTime('now'), 'updated_at' => new DateTime('now')],[ 'region_name'=>
                 'Barcelona','created_at' => new DateTime('now'), 'updated_at' => new DateTime('now')],[ 'region_name'=>
                 'Gerona','created_at' => new DateTime('now'), 'updated_at' => new DateTime('now')],[ 'region_name'=>
                 'Lérida','created_at' => new DateTime('now'), 'updated_at' => new DateTime('now')],[ 'region_name'=>
                 'Tarragona','created_at' => new DateTime('now'), 'updated_at' => new DateTime('now')],[ 'region_name'=>
                 'Badajoz','created_at' => new DateTime('now'), 'updated_at' => new DateTime('now')],[ 'region_name'=>
                 'Cáceres','created_at' => new DateTime('now'), 'updated_at' => new DateTime('now')],[ 'region_name'=>
                 'La Coruña', 'created_at' => new DateTime('now'), 'updated_at' => new DateTime('now')],[ 'region_name'=>
                 'Lugo','created_at' => new DateTime('now'), 'updated_at' => new DateTime('now')],[ 'region_name'=>
                 'Orense','created_at' => new DateTime('now'), 'updated_at' => new DateTime('now')],[ 'region_name'=>
                 'Pontevedra','created_at' => new DateTime('now'), 'updated_at' => new DateTime('now')],[ 'region_name'=>
                 'La Rioja' ,'created_at' => new DateTime('now'), 'updated_at' => new DateTime('now')],[ 'region_name'=>
                 'Islas Baleares','created_at' => new DateTime('now'), 'updated_at' => new DateTime('now')],[ 'region_name'=>
                 'Álava','created_at' => new DateTime('now'), 'updated_at' => new DateTime('now')],[ 'region_name'=>
                 'Guipúzcoa','created_at' => new DateTime('now'), 'updated_at' => new DateTime('now')],[ 'region_name'=>
                 'Vizcaya','created_at' => new DateTime('now'), 'updated_at' => new DateTime('now')],[ 'region_name'=>
                 'Las Palmas','created_at' => new DateTime('now'), 'updated_at' => new DateTime('now')],[ 'region_name'=>
                  'Santa Cruz De Tenerife','created_at' => new DateTime('now'), 'updated_at' => new DateTime('now')],[ 'region_name'=>
                 'Alicante','created_at' => new DateTime('now'), 'updated_at' => new DateTime('now')],[ 'region_name'=>
                 'Castellón','created_at' => new DateTime('now'), 'updated_at' => new DateTime('now')],[ 'region_name'=>
                 'Valencia','created_at' => new DateTime('now'), 'updated_at' => new DateTime('now') ] 
            ));
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
        Schema::dropIfExists('provincia');
        Schema::enableForeignKeyConstraints();
    }
}
