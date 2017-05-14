<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bobot;
use App\Variabel;
use App\Kriteria;
use App\Spk;
use App\Keluarga;

use DB;
use Validator, Redirect;

class BobotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'nama_bobot' => 'required|unique:bobots',
            'bobot' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->action('SpkController@index')->withErrors($validator)->withInput();
         } else {
            $bobot = new Bobot();
            $bobot->nama_bobot = $request->nama_bobot;
            $bobot->bobot = $request->bobot;
            $bobot->save();

            $krit = Kriteria::all();

            $jumbot =  DB::table('kriterias')
            ->join('bobots','kriterias.bobot_id','=','bobots.id')
            ->sum('bobots.bobot');

            foreach ($krit as $bobots) {
                $wj = $bobots->bobot->bobot/$jumbot;
                $bobots->wj = $wj;
                $bobots->save();
            }

            $variabel = Variabel::all();
            foreach ($variabel as $vari) {
                if ($vari->kriteria->tipe == "Biaya") {
                    $v = pow($vari->bobot->bobot, (-($vari->kriteria->wj)));
                    $vari->normalisasi = $v;
                    $vari->save();
                }else{
                    $v = pow($vari->bobot->bobot, $vari->kriteria->wj);
                    $vari->normalisasi = $v;
                    $vari->save();
                }
            }
            
            return redirect()->action('SpkController@index')->with('sukses', 'Berhasil menambah bobot');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
            'nama_bobot' => 'required',
            'bobot' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->action('SpkController@index')->withErrors($validator)->withInput();
         } else {
            $bobot = Bobot::find($request->id);
            $bobot->nama_bobot = $request->nama_bobot;
            $bobot->bobot = $request->bobot;
            $bobot->save();

            $krit = Kriteria::all();

            $jumbot =  DB::table('kriterias')
            ->join('bobots','kriterias.bobot_id','=','bobots.id')
            ->sum('bobots.bobot');

            foreach ($krit as $bobots) {
                $wj = $bobots->bobot->bobot/$jumbot;
                $bobots->wj = $wj;
                $bobots->save();
            }

            $variabel = Variabel::all();
            foreach ($variabel as $vari) {
                if ($vari->kriteria->tipe == "Biaya") {
                    $v = pow($vari->bobot->bobot, (-($vari->kriteria->wj)));
                    $vari->normalisasi = $v;
                    $vari->save();
                }else{
                    $v = pow($vari->bobot->bobot, $vari->kriteria->wj);
                    $vari->normalisasi = $v;
                    $vari->save();
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

            return redirect()->action('SpkController@index')->with('sukses', 'Berhasil mengubah bobot');
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
        $kriteria = Kriteria::where("bobot_id",$id)->delete();
        $variabel = Variabel::where("bobot_id",$id)->get();
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

        $v = Variabel::where("bobot_id",$id)->delete();
        $bobot= Bobot::destroy($id);

        if ($bobot) {
            return redirect('/spk')->with('sukses', 'Berhasil menghapus data bobot.');
        }
    }
}
