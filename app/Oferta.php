<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oferta extends Model
{
    public $timestamps = true;

    protected $fillable = ['categoria_id', 'provincia_id', 'titulo', 'salario', 'descripcion',
    'empresa_id', 'experiencia_id', 'contrato_id'];



    public function categoria(){

        return $this->belongsTo('App\Categoria', 'categoria_id');

    }


    public function provincia(){

        return $this->belongsTo('App\Provincia', 'provincia_id');

    }

    
    public function contrato(){

        return $this->belongsTo('App\Contrato', 'contrato_id', 'id');
        

    }


    public function experiencia(){

        return $this->belongsTo('App\Explaboral', 'experiencia_id', 'id');
        

    }


    public function trabajadors(){
        return $this->belongsToMany('App\Trabajador', 'oferta_trabajador');
    }

 

}