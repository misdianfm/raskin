<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rw extends Model
{
	protected $primaryKey = 'id_rw';

	protected $fillable = ['rw'];

	public $timestamps = false;

    public function keluarga()
    {
    	return $this->hasMany('App\Keluarga');
    }
    
}
