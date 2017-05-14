<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pekerjaan extends Model
{
	protected $primaryKey = 'id_pekerjaan';
	
	public $timestamps = false;
	
    public function penduduk()
    {
        return $this->hasMany('App\Penduduk');
    }
}
