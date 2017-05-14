<?php

namespace App\Http\Controllers;
use App\Bobot;
use App\Kriteria;
use App\Variabel;
use App\Keluarga;
use App\Spk;
use App\Penduduk;
use App\Lim;
use App\Http\Requests\SpkRequest;
use DB, Validator;
use Barryvdh\DomPDF\Facade as PDF;

use Illuminate\Support\Facades\Input;

use Illuminate\Http\Request;

class SpkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kriteria = Kriteria::all();
        $vari = Variabel::all();
        $bob = Bobot::pluck('bobot','id');
        $kri = Kriteria::pluck('kriteria','id');

        return view('spk.index',compact('kriteria', 'vari', 'bob', 'kri'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //TAMBAH HASIL SELEKSI
        $spk = new Spk();

        $keluarga = Keluarga::pluck('no_kk','id_kk');
        // $data = Spk::where('kk_id', $spk->kk_id)->with('variabel')->get()->pluck('variabel.normalisasi','id')->all();
        $keluarga2 = Keluarga::join('penduduks', function($join){
                $join->on('penduduks.kk_id','=', 'keluargas.id_kk')
                    ->where('penduduks.shdk_id','=', 1)
            ;})->select('no_kk', 'penduduks.nama', 'id_kk')->get();
        $kriteria = Kriteria::all();
        $variz = Variabel::all(['id', 'variabel','kriteria_id']);
        

        return view('spk.create', compact('spk','keluarga','variz','kriteria','keluarga2', 'penduduk'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SpkRequest $request)
    {
        
        $validator = Validator::make($request->all(),[
        ]//, $messages
        );

        // $validator = $request->all();

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
         } else {
            $variabel = array();
            $variabel = Input::get('variabel_id');
            $kk = array();
            $kk = Input::get('kk_id');;
            
            $keluarga = Keluarga::find($request->kk_id);
            
            $suksesTambah = 0;
                  
            foreach ($variabel as $variab) {
                for ($i=0; $i < count($variab); $i++) {
                    $spk = new Spk();
            
                    $spk->kk_id = $kk;
                    $spk->variabel_id = $variab;
                    $spk->save();

                    if ($spk->save()) {
                        $suksesTambah++;
                    }
                }
                if ($suksesTambah == count($variabel)) {
                    $data = Spk::where('kk_id', $spk->kk_id)->with('variabel')->get()->pluck('variabel.normalisasi','id')->all();
                    $jumlah = count($data);
                    $kali = 1;

                    foreach ($data as $dataa) {
                        $kali = $kali * $dataa;
                    }

                    $keluarga->vektor_s = $kali;
                    $keluarga->save();
                    
                    $jum = Keluarga::whereNotNull('vektor_s')->sum('vektor_s');
                    $kel = Keluarga::all();
                    foreach ($kel as $kelu) {
                        if($kelu->vektor_s == NULL)
                        {
                            $kelu->vektor_v = NULL;
                            $kelu->save();
                        }else{
                            $v = $kelu->vektor_s/$jum;
                            $kelu->vektor_v = $v;
                            $kelu->save();
                        }
                             
                    }
                    return redirect('/seleksi')->with('sukses', 'Berhasil menambah data spk');
                }
            }
            
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $keluarga = Keluarga::find($id);
        $spk = Spk::where('kk_id', $id)->get();

        return view('spk.show',compact('spk', 'keluarga', 'kelg'));
    }

    public function masterspk()
    {
        $bobot = Bobot::paginate(5,['*'],'bobot');

        $kriteria = Kriteria::paginate(10,['*'],'kriteria');
        $bob = Bobot::pluck('bobot','id');
        
        $variabel = Variabel::paginate(10,['*'],'variabel');
        $kri = Kriteria::pluck('kriteria','id');
       

        return view('spk.masterspk',compact('bobot', 'kriteria','bob','kri','variabel'));
    }

    public function kriteria()
    {
        $kriteria = Kriteria::all();
        $vari = Variabel::all();

        return view('kriteriaspk',compact('vari','kriteria'));
    }

    public function hitung()
    {
        $kriteria = Kriteria::paginate(15,['*'],'kriteria');
        $keluarga = Keluarga::join('penduduks', function($join){
                $join->on('penduduks.kk_id','=', 'keluargas.id_kk')
                    ->where('penduduks.shdk_id','=', 1)
            ;})
            ->where('vektor_s', '!=', NULL)->paginate(15,['*'],'keluarga');
        
        $jumbot =  DB::table('kriterias')
            ->join('bobots','kriterias.bobot_id','=','bobots.id')
            ->sum('bobots.bobot');

        $jum =  DB::table('keluargas')->sum('vektor_s');
        $jumz =  DB::table('keluargas')->sum('vektor_v');

        $jum1 = DB::table('kriterias')->sum('bobot');
        $jumz1 = DB::table('kriterias')->sum('wj');

        $variabel = Spk::all();
        return view('perhitunganspk', compact('kriteria','keluarga','jumbot','jum','jumz','jum1','jumz1', 'variabel'));
    }

    public function hasilseleksi(Request $request)
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

        return view('spk.hasilseleksi', compact('keluarga','cari', 'keluarga2','cari2','lims', 'jumz'));
    }

    public function seleksi(Request $request)
    {
        $cari = $request->get('search');
        
        $keluarga = Keluarga::join('rws', 'keluargas.rw_id', '=', 'rws.id_rw')
            ->join('rts', 'keluargas.rt_id', '=', 'rts.id_rt')
            ->join('penduduks', function($join){
                $join->on('penduduks.kk_id','=', 'keluargas.id_kk')
                    ->where('penduduks.shdk_id','=', 1)
                    ->whereNotNull('vektor_s')
            ;})
            ->where('no_kk','LIKE','%'.$cari.'%')
            ->orwhere('alamat','LIKE','%'.$cari.'%')
            ->orwhere('vektor_v','LIKE','%'.$cari.'%')
            ->orwhere('penduduks.nama','LIKE','%'.$cari.'%')
            ->orwhere('rts.rt','LIKE','%'.$cari.'%')
            ->orwhere('rws.rw','LIKE','%'.$cari.'%')
            ->orderBy('vektor_v', 'desc')
            ->paginate(25,['*'],'keluarga');

        return view('spk.seleksi', compact('keluarga','cari'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kelz = Keluarga::find($id);
        $spk = Spk::where('kk_id', $id)->pluck('variabel_id')->toArray();
        // var_dump($spk);
        $spkk = Spk::find($id);

        $keluarga = Keluarga::pluck('no_kk','id_kk');
        $kriteria = Kriteria::all();
        $variz = Variabel::all(['id', 'variabel','kriteria_id']);
        

        return view('spk.edit', compact('spk','keluarga','variz','kriteria','kelz','spkk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SpkRequest $request, $id)
    {
         $validator = Validator::make($request->all(),[
        ]//, $messages
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
         } else {
            $hapus = Spk::where("kk_id", $id)->delete();
            if ($hapus) {
                $variabel = array();
                $variabel = Input::get('variabel_id');
                $kk = array();
                $kk = Input::get('kk_id');
                
                $keluarga = Keluarga::find($id);
                
                $suksesTambah = 0;
                foreach ($variabel as $variab) {
                    for ($i=0; $i < count($variab); $i++) {
                        $spk = new Spk();
                        $spk->kk_id = $id;
                        $spk->variabel_id = $variab;
                        $spk->save();

                        if ($spk->save()) {
                            $suksesTambah++;
                        }
                    }
                    if ($suksesTambah == count($variabel)) {
                        $data = Spk::where('kk_id', $spk->kk_id)->with('variabel')->get()->pluck('variabel.normalisasi','id')->all();
                        $jumlah = count($data);
                        $kali = 1;

                        foreach ($data as $dataa) {
                            $kali = $kali * $dataa;
                        }

                        $keluarga->vektor_s = $kali;
                        $keluarga->save();
                        
                        $jum = Keluarga::whereNotNull('vektor_s')->sum('vektor_s');
                        $kel = Keluarga::all();
                        foreach ($kel as $kelu) {
                            if($kelu->vektor_s == NULL)
                            {
                                $kelu->vektor_v = NULL;
                                $kelu->save();
                            }else{
                                $v = $kelu->vektor_s/$jum;
                                $kelu->vektor_v = $v;
                                $kelu->save();
                            }
                                 
                        }
                        return redirect('/seleksi')->with('sukses', 'Berhasil mengubah data spk');
                    }
                }
            }
                  
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $spk = Spk::where('kk_id', '=', $id)->delete();
        if ($spk) {
            $keluarga = Keluarga::find($id);
            $keluarga->vektor_s = NULL;
            $keluarga->vektor_v = NULL;
            $keluarga->save();

            $jum = Keluarga::whereNotNull('vektor_s')->sum('vektor_s');
            
            $kel = Keluarga::all();
            foreach ($kel as $kelu) {
                if($kelu->vektor_s == NULL)
                {
                    $kelu->vektor_v = NULL;
                    $kelu->save();
                }else{
                    $v = $kelu->vektor_s/$jum;
                    $kelu->vektor_v = $v;
                    $kelu->save();
                }    
            }
            return redirect('/seleksi')->with('sukses', 'Berhasil menghapus data seleksi.');
            // if ($keluarga->save()) {
            //     return redirect('/home')->with('sukses', 'Berhasil menghapus data seleksi.');
            // }
        }
    }

    public function getPdf()
    {
        $lims = Lim::where("id", 1)->first();
        // $spk = Keluarga::whereNotNull('vektor_s')->get();
        $penduduk = Penduduk::where('shdk_id',1)->get();
        $spk = Keluarga::join('rws', 'keluargas.rw_id', '=', 'rws.id_rw')
            ->join('rts', 'keluargas.rt_id', '=', 'rts.id_rt')
            ->join('penduduks', 'keluargas.id_kk','=','penduduks.kk_id')
            ->where('vektor_s','!=', NULL)
            ->select('no_kk', 'alamat', 'vektor_v', 'rws.rw', 'rts.rt', 'penduduks.nama', 'penduduks.shdk_id')
            ->orderBy('vektor_v', 'desc')
            ->limit($lims->lim)
            ->get();
        $pdf = PDF::loadView('spk.pdf',compact('spk','pendu'))
                    ->setPaper('a4');
     
        return $pdf->stream();
    }
}
