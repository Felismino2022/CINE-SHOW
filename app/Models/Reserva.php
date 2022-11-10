<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $table = "reservas";

    public function utilizador(){
        return $this->belongsTo('App\Models\Utilizador');
    }

    public function client(){
        return $this->belongsTo('App\Models\Client');
    }

    public function seccao(){
        return $this->belongsTo('App\Models\Seccao');
    }
    public function lugares(){
        return $this->belongsToMany('App\Models\Lugar');
    }
}
