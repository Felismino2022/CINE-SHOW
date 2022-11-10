<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    use HasFactory;

    public function provincia(){
        return $this->belongsTo('App\Models\Provincia');
    }

    public function cinemas(){
        return $this->hasMany('App\Models\Cinema');
    }
}
