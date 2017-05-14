<?php

namespace App;
use App\Penduduk;
use Illuminate\Database\Eloquent\Model;

class Keluarga extends Model
{
    protected $primaryKey = 'id_kk';

	public $timestamps = false;
    
    public function rt()
    {
    	return $this->belongsTo('App\Rt');
    }
   
    public function rw()
    {
    	return $this->belongsTo('App\Rw');
    }

    public function spk()
    {
        return $this->hasMany('App\Spk');
    }
   
    public function penduduk()
    {
        return $this->hasMany('App\Penduduk');
    }
    
}
