<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spk extends Model
{
	protected $table = 'spks';

    public $timestamps = false;

    public function kk()
    {
    	return $this->belongsTo('App\Keluarga');
    }

    public function variabel()
    {
    	return $this->belongsTo('App\Variabel');
    }
}
