<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agama extends Model
{
	protected $primaryKey = 'id_agama';

	public $timestamps = false;
	
    public function penduduk()
    {
        return $this->hasMany('App\Penduduk');
    }
}
