<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Variabel;
use App\Kriteria;
use App\Bobot;
use App\Spk;
use App\Keluarga;
use Validator;

class VariabelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vari = Variabel::all();
        return view('variabel.index',compact('vari'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $variab = new Variabel;
        $krit = Kriteria::pluck('kriteria','id');
        $bob = Bobot::pluck('nama_bobot','id');
        return view('variabel.create',compact('variab','krit','bob'));
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
            'variabel' => 'required|unique:variabels',
            'bobot' => 'required',
            // 'kriteria_id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->action('SpkController@index')->withErrors($validator)->withInput();
         } else {
            $variabel = new Variabel();
            $variabel->variabel = $request->variabel;
            $variabel->bobot = $request->bobot;
            $variabel->kriteria_id = $request->kriteria_id;
            $variabel->save();

            $vari = Variabel::find($variabel->id);
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
            

            return redirect('/spk')->with('sukses', 'Berhasil menambah nilai kriteria "'.$variabel->variabel.'" pada kriteria "'.$variabel->kriteria->kriteria.'".');
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
        $variab = Variabel::find($id);
        return view('variabel.edit',compact('variab'));
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
            'variabel' => 'required',
            'bobot' => 'required',
            // 'kriteria_id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->action('SpkController@index')->withErrors($validator)->withInput();
         } else {
            $variabel = Variabel::find($request->id);
            $variabel->variabel = $request->variabel;
            // $variabel->bobot_id = $request->bobot_id;
            $variabel->bobot = $request->bobot;
            $variabel->kriteria_id = $request->kriteria_id;
            $variabel->save();

            $vari = Variabel::find($variabel->id);
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
            
            if ($vari->save()) {
                // VEKTORZZZZ    
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
            }

            return redirect('/spk')->with('sukses', 'Berhasil mengubah nilai kriteria "'.$variabel->variabel.'" pada kriteria "'.$variabel->kriteria->kriteria.'".');
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

        $spk = Spk::where("variabel_id", $id)->get();
        $keluarga = Keluarga::all();
        foreach ($keluarga as $kelu) {
            foreach ($spk as $sp) {
                if ($sp->kk_id == $kelu->id_kk) {
                    $kelu->vektor_s = NULL;
                    $kelu->vektor_v = NULL;
                    $kelu->save();
                    $spk2 = Spk::where("kk_id", $sp->kk_id)->delete();
                }
            } 
        }
        $variabel = Variabel::destroy($id);
        if ($variabel) {
            return redirect('/spk')->with('sukses', 'Berhasil menghapus nilai kriteria!');
        }
    }
}
