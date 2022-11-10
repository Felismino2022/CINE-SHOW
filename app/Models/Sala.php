<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{
    use HasFactory;

    public function cinema(){
        return $this->belongsTo('App\Models\Cinema');
    }
    public function utilizador(){
        return $this->belongsTo('App\Models\Utilizador');
    }

    public function lugares(){
        return $this->hasMany('App\Models\Lugar');
    }
    public function seccoes(){
        return $this->hasMany('App\Models\Seccao');
    }
}
