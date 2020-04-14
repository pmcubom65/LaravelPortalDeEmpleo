<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experiencia extends Model
{
    protected $table='expe';
    public $timestamps = true;

    protected $fillable = ['categoria_id', 'descripcion', 'empresa', 'fin', 'inicio','puesto', 'user_id'];

    public function categoria(){

        return $this->belongsTo('App\Categoria', 'categoria_id');

    }
    public function user() {
        return $this->hasOne('App\User','id','user_id');
    }

}
