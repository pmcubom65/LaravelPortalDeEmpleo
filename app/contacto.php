<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Contacto extends Model
{

    protected $table='contactos';


    public function oferta_trabajador(){

        return $this->belongsTo('App\Oferta_trabajador', 'oferta_trabajador_id');
        

    }

    public function getDate() {
    
        return Carbon::parse($this->dia)->format('Y-m-d');
    }



 
}
