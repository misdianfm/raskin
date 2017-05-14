<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Kriteria extends Model
{
	public $timestamps = false;

    public function bobott()
    {
    	return $this->belongsTo('App\Bobot');
    }

    public function variabel()
    {
        return $this->hasMany('App\Variabel');
    }
    public function bobaru($a,$id)
    {
        $ww = Kriteria::find($id);
        $ww->wj = $a;
        $ww->save();

        return $this->ww();
   	}
}
