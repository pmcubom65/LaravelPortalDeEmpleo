<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    

    public function provincia(){

        return $this->belongsTo('App\Provincia', 'provincia_id');

    }


    public function usuario(){

        return $this->belongsTo('App\User', 'user_id');

    }


}
