<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    use HasFactory;

    public function cidades(){
        return $this->hasMany('App\Models\Cidade');
    }

   
}
