<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cinema extends Model
{
    use HasFactory;

    public function utilizador(){
        return $this->belongsTo('App\Models\Utilizador');
    }

    public function cidade(){
        return $this->belongsTo('App\Models\Cidade');
    }

    public function salas(){
        return $this->hasMany('App\Models\Sala');
    }
}
