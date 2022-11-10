<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utilizador extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function cinemas(){
        return $this->hasMany('App\Models\Cinema');
    }
    public function salas(){
        return $this->hasMany('App\Models\Sala');
    }

    public function lugares(){
        return $this->hasMany('App\Models\Lugar');
    }
    public function filmes(){
        return $this->hasMany('App\Models\Filme');
    }
    public function seccoes(){
        return $this->hasMany('App\Models\Seccao');
    }
    public function reservas(){
        return $this->hasMany('App\Models\Reserva');
    }
}
