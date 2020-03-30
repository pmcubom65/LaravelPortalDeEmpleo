<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experiencia extends Model
{
    protected $table='expe';
    public $timestamps = true;

    public function categoria(){

        return $this->hasOne('App\Categoria');

    }
}
