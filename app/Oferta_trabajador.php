<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oferta_trabajador extends Model
{
    protected $table='oferta_trabajador';

    protected $fillable = [
        'seleccionado'
    ];


    public function contacto(){

        return $this->hasOne('App\Contacto', 'oferta_trabajador_id');

    }

    public function ofertas()
     {
        return $this->hasMany('App\Oferta', 'id', 'oferta_id');
     }



}
