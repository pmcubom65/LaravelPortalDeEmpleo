<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trabajador extends Model
{
    public function hasUser(){

        return $this->hasOne('App\User');

    }


    public function hasProvincia() {
        return $this->hasOne('App\Provincia', 'foreign_key');
    }
}
