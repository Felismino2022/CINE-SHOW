<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seccao extends Model
{
    use HasFactory;

    public function utilizador(){
        return $this->belongsTo('App\Models\Utilizador');
    }

    public function filme(){
        return $this->belongsTo('App\Models\Filme');
    }
    public function sala(){
        return $this->belongsTo('App\Models\Sala');
    }

    public function reservas(){
        return $this->hasMany('App\Models\Reserva');
    }
}
