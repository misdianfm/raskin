<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jk extends Model
{
	protected $primaryKey = 'id_jk';
	protected $table = 'jks';
    public function penduduk()
    {
        return $this->hasMany('App\Penduduk');
    }
}
