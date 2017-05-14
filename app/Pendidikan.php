<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
	protected $primaryKey = 'id_pendidikan';

	public $timestamps = false;
	
    public function penduduk()
    {
        return $this->hasMany('App\Penduduk');
    }
}
