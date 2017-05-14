<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bobot extends Model
{
    public $timestamps = false;

    public function kriteria()
    {
        return $this->hasMany('App\Kriteria');
    }

    public function variabel()
    {
        return $this->hasMany('App\Variabel');
    }
}
