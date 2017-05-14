<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tempatlahir extends Model
{
	protected $primaryKey = 'id_tl';

	public $timestamps = false;
	
    public function penduduk()
    {
        return $this->hasMany('App\Penduduk');
    }
}
