<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Trabajador extends Model
{
    
    protected $dates = ['fecha'];
    
    public function hasUser(){

        return $this->hasOne('App\User');

    }


    public function hasProvincia() {
        return $this->hasOne('App\Provincia', 'foreign_key');
    }


    public function getDate()

{
    
    return Carbon::parse($this->fecha)->format('Y-m-d');
}
}