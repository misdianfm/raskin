<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rt extends Model
{
	protected $primaryKey = 'id_rt';

	protected $fillable = ['rt'];

	
    public function keluarga()
    {
    	return $this->hasMany('App\Keluarga');
    }
    public $timestamps = false;
}
