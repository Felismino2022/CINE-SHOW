<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filme extends Model
{
    use HasFactory;

    protected  $dates = ['data_lancamento'];

    public function utilizador(){
        return $this->belongsTo('App\Models\Utilizador');
    }
    public function seccoes(){
        return $this->hasMany('App\Models\Seccao');
    }
}
