<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kriteria;
use App\Variabel;
use App\Bobot;
use App\Keluarga;
use App\Spk;

use DB;
use Validator, Redirect;


class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $krit = Kriteria::all();        
        
        $jumbot =  DB::table('kriterias')
            ->join('bobots','kriterias.bobot_id','=','bobots.id')
            ->sum('bobot_id','=','bobots.bobot');

        return view('kriteria.index',compact('krit','jumbot'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'kriteria' => 'required|unique:kriterias',
            'bobot_id' => 'required',
            'bobot2' => 'required',
            'tipe' => 'required',
            'variabel2' => 'required',
            // 'bobot_id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->action('SpkController@index')->withErrors($validator)->withInput();
         } else {
            $kriteria = new Kriteria();
            $kriteria->kriteria = $request->kriteria;
            $kriteria->bobot = $request->bobot_id;
            // $kriteria->bobot_id = $request->bobot_id;
            $kriteria->tipe = $request->tipe;
            $kriteria->save();

            $variabel = new Variabel();
            $variabel->variabel = $request->variabel2;
            $variabel->bobot = $request->bobot2;
            $variabel->kriteria_id = $kriteria->id;
            $variabel->save();

            // $jumbot =  DB::table('kriterias')
            // ->join('bobots','kriterias.bobot_id','=','bobots.id')
            // ->sum('bobots.bobot');

            $jumbot =  DB::table('kriterias')->sum('bobot');

            $krit = Kriteria::all();

            foreach ($krit as $bobots) {
                // $wj = $bobots->bobot->bobot/$jumbot;
                $wj = $bobots->bobot/$jumbot;
                $bobots->wj = $wj;
                $bobots->save();
            }

            $variabel = Variabel::all();
            foreach ($variabel as $vari) {
                if ($vari->bobot != 0) {
                    if ($vari->kriteria->tipe == "Biaya") {
                        // $v = pow($vari->bobot->bobot, (-($vari->kriteria->wj)));
                        $v = pow($vari->bobot, (-($vari->kriteria->wj)));
                        $vari->normalisasi = $v;
                        $vari->save();
                    }else{
                        // $v = pow($vari->bobot->bobot, $vari->kriteria->wj);
                        $v = pow($vari->bobot, $vari->kriteria->wj);
                        $vari->normalisasi = $v;
                        $vari->save();
                    }
                }
            }

            // VEKTORZZZZ    
            $keluarg = Keluarga::all();
            foreach ($keluarg as $kelz) {
                $keluarg = Keluarga::all();
                foreach ($keluarg as $kelz) {
                    $data = Spk::where('kk_id', $kelz->id_kk)->with('variabel')->get()->pluck('variabel.normalisasi','id')->all();
                    $jumlah = count($data);
                    $kali = 1;
                        
                    foreach ($data as $dataa) {
                        $kali = $kali * $dataa;
                    }
                    $keluarga = Keluarga::find($kelz->id_kk);
                    $keluarga->vektor_s = $kali;
                    $keluarga->save();
                } 
            }
                    
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
            // VEKTORZZZZ
            // return redirect()->action('SpkController@index')->with('sukses', 'Berhasil menambah kriteria');
            return redirect('/spk')->with('sukses', 'Berhasil menambah kriteria "'.$kriteria->kriteria.'".');
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
        $krit = Kriteria::find($id);
        return view('perhitunganspk', compact('krit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'kriteria' => 'required',
            'bobot' => 'required',
            'tipe' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->action('SpkController@index')->withErrors($validator)->withInput();
         } else {
            $kriteria = Kriteria::find($request->id);
            $kriteria->kriteria = $request->kriteria;
            // $kriteria->bobot_id = $request->bobot_id;
            $kriteria->bobot = $request->bobot;
            $kriteria->tipe = $request->tipe;
            $kriteria->save();
            
            $krit = Kriteria::all();

            $jumbot =  DB::table('kriterias')->sum('bobot');

            foreach ($krit as $bobots) {
                $wj = $bobots->bobot/$jumbot;
                $bobots->wj = $wj;
                $bobots->save();
            }

            $variabel = Variabel::all();
            foreach ($variabel as $vari) {
                if ($vari->kriteria->tipe == "Biaya") {
                    $v = pow($vari->bobot, (-($vari->kriteria->wj)));
                    $vari->normalisasi = $v;
                    $vari->save();
                }else{
                    $v = pow($vari->bobot, $vari->kriteria->wj);
                    $vari->normalisasi = $v;
                    $vari->save();
                }
            }

            // VEKTORZZZZ    
            $keluarg = Keluarga::all();
            foreach ($keluarg as $kelz) {
                $keluarg = Keluarga::all();
                foreach ($keluarg as $kelz) {
                    $data = Spk::where('kk_id', $kelz->id_kk)->with('variabel')->get()->pluck('variabel.normalisasi','id')->all();
                    $jumlah = count($data);
                    $kali = 1;
                        
                    foreach ($data as $dataa) {
                        $kali = $kali * $dataa;
                    }
                    $keluarga = Keluarga::find($kelz->id_kk);
                    $keluarga->vektor_s = $kali;
                    $keluarga->save();
                } 
            }
                    
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
            // VEKTORZZZZ

            return redirect('/spk')->with('sukses', 'Berhasil mengubah kriteria "'.$kriteria->kriteria.'".');
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
        $variabel = Variabel::where("kriteria_id",$id)->get();
        $spk = Spk::all();
        $keluarga = Keluarga::all();

        foreach ($variabel as $vari) {
            foreach ($spk as $sp) {
                if ($sp->variabel_id == $vari->id) {
                    foreach ($keluarga as $kelu) {
                        if ($sp->kk_id == $kelu->id_kk) {
                            $kelu->vektor_s = NULL;
                            $kelu->vektor_v = NULL;
                            $kelu->save();
                            $spk2 = Spk::where("kk_id", $sp->kk_id)->delete();
                        }
                    }
                }
            } 
        }

        $variab = Variabel::where("kriteria_id",$id)->delete();
        $kriteria= Kriteria::destroy($id);

        $jumbot =  DB::table('kriterias')->sum('bobot');

        $krit = Kriteria::all();
            
        foreach ($krit as $bobots) {
            if ($jumbot != 0) {
                $wj = $bobots->bobot/$jumbot;
                $bobots->wj = $wj;
                $bobots->save();
            }
        }

        $variabel = Variabel::all();
        foreach ($variabel as $vari) {
            if ($vari->bobot != 0) {
                if ($vari->kriteria->tipe == "Biaya") {
                    $v = pow($vari->bobot, (-($vari->kriteria->wj)));
                    $vari->normalisasi = $v;
                    $vari->save();
                }else{
                    $v = pow($vari->bobot, $vari->kriteria->wj);
                    $vari->normalisasi = $v;
                    $vari->save();
                }
            }
        }

        // VEKTORZZZZ    
        $keluarg = Keluarga::all();
        foreach ($keluarg as $kelz) {
            if ($kelz->vektor_s != NULL) {
                $data = Spk::where('kk_id', $kelz->id_kk)->with('variabel')->get()->pluck('variabel.normalisasi','id')->all();
                $jumlah = count($data);
                $kali = 1;

                foreach ($data as $dataa) {
                    $kali = $kali * $dataa;
                }
                $keluarga = Keluarga::find($kelz->id_kk);
                $keluarga->vektor_s = $kali;
                $keluarga->save();
            } 
        }
                    
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
        // VEKTORZZZZ
        if ($kriteria) {
            return redirect('/spk')->with('sukses', 'Berhasil menghapus data kriteria.');
        }
    }

    
    
}
