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
        Schema::create('provincia', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('region_name');

        });
        DB::table('provincia')->delete();
        DB::table('provincia')->insert(
            array(['region_name'=>
                 'Albacete'],[ 'region_name'=>
                 'Ciudad Real'],[ 'region_name'=>
                 'Cuenca'],[ 'region_name'=>
                 'Guadalajara'],[ 'region_name'=>
                 'Toledo'],[ 'region_name'=>
                 'Huesca'],[ 'region_name'=>
                 'Teruel'],[ 'region_name'=>
                  'Zaragoza'],[ 'region_name'=>
                  'Ceuta'],[ 'region_name'=>
                 'Madrid'],[ 'region_name'=>
                 'Murcia'],[ 'region_name'=>
                 'Melilla'],[ 'region_name'=>
                 'Navarra'],[ 'region_name'=>
                 'Almería'],[ 'region_name'=>
                 'Cádiz'],[ 'region_name'=>
                  'Córdoba'],[ 'region_name'=>
                 'Granada'],[ 'region_name'=>
                  'Huelva'],[ 'region_name'=>
                 'Jaén'],[ 'region_name'=>
                  'Málaga'],[ 'region_name'=>
                 'Sevilla'],[ 'region_name'=>
                   'Asturias'],[ 'region_name'=>
                   'Cantabria'],[ 'region_name'=>
                   'Ávila'],[ 'region_name'=>
                   'Burgos'],[ 'region_name'=>
                   'León'],[ 'region_name'=>
                   'Palencia'],[ 'region_name'=>
                   'Salamanca'],[ 'region_name'=>
                   'Segovia'],[ 'region_name'=>
                   'Soria'],[ 'region_name'=>
                   'Valladolid'],[ 'region_name'=>
                   'Zamora'],[ 'region_name'=>
                 'Barcelona'],[ 'region_name'=>
                 'Gerona'],[ 'region_name'=>
                 'Lérida'],[ 'region_name'=>
                 'Tarragona'],[ 'region_name'=>
                 'Badajoz'],[ 'region_name'=>
                 'Cáceres'],[ 'region_name'=>
                 'La Coruña',  'region_name'=>
                 'Lugo'],[ 'region_name'=>
                 'Orense'],[ 'region_name'=>
                 'Pontevedra'],[ 'region_name'=>
                 'La Rioja' , 'region_name'=>
                 'Islas Baleares'],[ 'region_name'=>
                 'Álava'],[ 'region_name'=>
                 'Guipúzcoa'],[ 'region_name'=>
                 'Vizcaya'],[ 'region_name'=>
                 'Las Palmas'],[ 'region_name'=>
                  'Santa Cruz De Tenerife'],[ 'region_name'=>
                 'Alicante'],[ 'region_name'=>
                 'Castellón'],[ 'region_name'=>
                 'Valencia' ] 
            ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('provincia');
    }
}
