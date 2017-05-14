<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Variabel extends Model
{
    protected $table = 'variabels';

    public $timestamps = false;

    public function kriteria()
    {
    	return $this->belongsTo('App\Kriteria');
    }

    public function bobott()
    {
    	return $this->belongsTo('App\Bobot');
    }
    public function spk()
    {
        return $this->hasMany('App\Spk');
    }
    
}
