<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Trabajador extends Model
{
    
    protected $dates = ['fecha'];
    
    public function user() {
        return $this->hasOne('App\User','id','user_id');
    }


    public function hasProvincia() {
        return $this->belongsTo('App\Provincia', 'provincia_id');
    }


    public function ofertasempleo(){
        return $this->belongsToMany('App\Oferta', 'Oferta_trabajador','trabajador_id', 'oferta_id')->withPivot('seleccionado','id', 'updated_at');
    }



    public function getDate() {
    
    return Carbon::parse($this->fecha)->format('Y-m-d');
}



public function hasUser() {
    return $this->belongsTo('App\User', 'user_id', 'id');
}



}