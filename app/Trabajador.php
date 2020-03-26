<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trabajador extends Model
{
    public function hasUser(){

        return $this->hasOne('App\User');

    }
}
