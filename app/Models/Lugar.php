<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lugar extends Model
{
    use HasFactory;

    protected $table = "lugars";

    public function utilizador(){
        return $this->belongsTo('App\Models\Utilizador');
    }
    public function sala(){
        return $this->belongsTo('App\Models\Sala');
    }

    public function reservas(){
        return $this->belongsToMany('App\Models\Reserva');
    }
}
