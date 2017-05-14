<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Keluarga;
use App\Penduduk;
use App\Lim;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $lims = Lim::where("id", 1)->first();
        $jumz =  DB::table('keluargas')->count('vektor_v');
        $cari2 = $request->get('seleksi');
        
        $keluarga2 = Keluarga::join('rws', 'keluargas.rw_id', '=', 'rws.id_rw')
            ->join('rts', 'keluargas.rt_id', '=', 'rts.id_rt')
            ->join('penduduks', function($join){
                $join->on('penduduks.kk_id','=', 'keluargas.id_kk')
                    ->where('penduduks.shdk_id','=', 1)
                    ->whereNotNull('vektor_s')
            ;})
            ->where('no_kk','LIKE','%'.$cari2.'%')
            ->orwhere('alamat','LIKE','%'.$cari2.'%')
            ->orwhere('vektor_v','LIKE','%'.$cari2.'%')
            ->orwhere('penduduks.nama','LIKE','%'.$cari2.'%')
            ->orwhere('rts.rt','LIKE','%'.$cari2.'%')
            ->orwhere('rws.rw','LIKE','%'.$cari2.'%')
            ->orderBy('vektor_v', 'desc')
            ->limit($lims->lim)
            // ->paginate(15,['*'],'seleksi')
            ->get();

        return view('home', compact('keluarga','cari', 'keluarga2','cari2','lims', 'jumz'));
    }
}
