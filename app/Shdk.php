<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shdk extends Model
{
	protected $primaryKey = 'id_shdk';

	public $timestamps = false;
	
    public function penduduk()
    {
        return $this->hasMany('App\Penduduk');
    }
}
