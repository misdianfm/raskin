<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    protected $primaryKey = 'id_penduduk';
    
    //protected $fillable = ['id_penduduk','nik','no_kk','nama','jk','tempatlahir','goldar','agama','pendidikan','pekerjaan','status_kawin','shdk','nama_ayah','nama_ibu'];

    public $timestamps = false;
    
    public function kk()
    {
    	return $this->belongsTo('App\Keluarga');
    }

    public function jk()
    {
    	return $this->belongsTo('App\Jk');
    }

    public function tl()
    {
    	return $this->belongsTo('App\Tempatlahir');
    }

    public function goldar()
    {
    	return $this->belongsTo('App\Goldar');
    }

    public function agama()
    {
    	return $this->belongsTo('App\Agama');
    }

    public function pendidikan()
    {
    	return $this->belongsTo('App\Pendidikan');
    }

    public function pekerjaan()
    {
    	return $this->belongsTo('App\Pekerjaan');
    }

    public function shdk()
    {
    	return $this->belongsTo('App\Shdk');
    }
}
