<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Keluarga;
use App\Rt;
use App\Rw;
use App\Spk;
use App\Penduduk;
use App\Jk;
use App\Tempatlahir;
use App\Agama;
use App\Goldar;
use App\Pekerjaan;
use App\Pendidikan;
use App\Shdk;

use DB;
use Datatables;
use Validator, Redirect;

class KeluargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        $cari = $req->get('search');
        $kel = Keluarga::join('rts','keluargas.rt_id','=','rts.id_rt')->join('rws','keluargas.rw_id','=','rws.id_rw')
            ->join('penduduks', function($join){
                $join->on('penduduks.kk_id','=', 'keluargas.id_kk')
                    ->where('penduduks.shdk_id','=', 1)
            ;})
            ->where('keluargas.no_kk','LIKE','%'.$cari.'%')
            ->orwhere('keluargas.alamat','LIKE','%'.$cari.'%')
            ->orwhere('rts.rt','LIKE','%'.$cari.'%')
            ->orwhere('rws.rw','LIKE','%'.$cari.'%')
            ->orwhere('penduduks.nama','LIKE','%'.$cari.'%')
            ->paginate(20);
        $rt = Rt::pluck('rt','id_rt');
        $rw = Rw::pluck('rw','id_rw');
        return view('keluarga.index',compact('kel','rt','rw'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kel = new Keluarga();
        $rt = Rt::pluck('rt','id_rt');
        $rw = Rw::pluck('rw','id_rw');

        $penduduk = new Penduduk();
        
        $goldars = Goldar::pluck('goldar', 'id_goldar');        
        $jks = Jk::all(['id_jk', 'jk']);

        $agama = Agama::pluck('agama','id_agama');
        $tl = Tempatlahir::pluck('tl','id_tl');
        $pekerjaan = Pekerjaan::pluck('pekerjaan','id_pekerjaan');
        $pendidikan = Pendidikan::pluck('pendidikan','id_pendidikan');
        $shdk = Shdk::pluck('shdk','id_shdk');

        return view('keluarga.create', compact('kel','rt','rw','spk', 'penduduk','agama','keluarga','tl','pekerjaan','pendidikan','shdk','jks','goldars'));
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
            'no_kk' => 'required|unique:keluargas',
            'alamat' => 'required',
            'rt_id' => 'required',
            'rw_id' => 'required',
            'nik' => 'required|unique:penduduks',
            'nama' => 'required',
            'jk_id' => 'required',
            'tl_id' => 'required',
            'tlahir' => 'required',
            'goldar_id' => 'required',
            'agama_id' => 'required',
            'pendidikan_id' => 'required',
            'pekerjaan_id' => 'required',
            'status_kawin' => 'required',
            'nama_ayah' => 'required',
            'nama_ibu' => 'required',
        ]
       );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
         } else {

        $kel = new Keluarga();
        $kel->id_kk = $request->id_kk;
        $kel->no_kk = $request->no_kk;
        $kel->alamat = $request->alamat;
        $kel->rt_id = $request->rt_id;
        $kel->rw_id = $request->rw_id;

        $kel->save();

        $penduduk = new Penduduk();
            
        $penduduk->nik = $request->nik;
        $penduduk->kk_id = $kel->id_kk;
        $penduduk->nama = $request->nama;
        $penduduk->jk_id = $request->jk_id;
        $penduduk->tl_id = $request->tl_id;
        $penduduk->tlahir = $request->tlahir;
        $penduduk->goldar_id = $request->goldar_id;
        $penduduk->agama_id = $request->agama_id;
        $penduduk->pendidikan_id = $request->pendidikan_id;
        $penduduk->pekerjaan_id = $request->pekerjaan_id;
        $penduduk->status_kawin = $request->status_kawin;
        $penduduk->shdk_id = "1";
        $penduduk->nama_ayah = $request->nama_ayah;
        $penduduk->nama_ibu = $request->nama_ibu;
        $penduduk->akta_lahir = $request->akta_lahir;
        $penduduk->akta_lahir_no = $request->akta_lahir_no;
        $penduduk->akta_kawin = $request->akta_kawin;
        $penduduk->akta_kawin_no = $request->akta_kawin_no;
        $penduduk->akta_cerai = $request->akta_cerai;
        $penduduk->akta_cerai_no = $request->akta_cerai_no;

        $penduduk->save();
        /*return redirect()->action('KeluargaController@index')->with('sukses', 'Berhasil menambah data keluarga');*/
        return redirect()->route('keluarga.show', [$kel->id_kk])->with('sukses', 'Berhasil menambah data keluarga');
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
        $kel = Keluarga::find($id);

        $pend = DB::table('penduduks')
            ->join('keluargas', 'penduduks.kk_id', '=', 'keluargas.id_kk')
            ->join('jks', 'penduduks.jk_id', '=', 'jks.id_jk')
            ->join('shdks', 'penduduks.shdk_id', '=', 'shdks.id_shdk')
            ->join('tempatlahirs', 'penduduks.tl_id', '=', 'tempatlahirs.id_tl')
            ->select('penduduks.id_penduduk','penduduks.nik','penduduks.nama','shdks.shdk','jks.jk','tempatlahirs.tl','penduduks.tlahir')
            ->where('keluargas.id_kk','=',$id)
            ->get();

        return view('keluarga.show',compact('kel', 'pend'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kel = Keluarga::find($id);
        $rt = Rt::pluck('rt','id_rt');
        $rw = Rw::pluck('rw','id_rw');
        return view('keluarga.edit',compact('kel','rt','rw'));
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
        /*$kel = Keluarga::find($request->id);
        $kel->no_kk = $request->no_kk;
        $kel->alamat = $request->alamat;
        $kel->rt = $request->rt;
        $kel->rw = $request->rw;

        $kel->update();*/
        $validator = Validator::make($request->all(),[
            'no_kk' => 'required',
            'alamat' => 'required',
            'rt_id' => 'required',
            'rw_id' => 'required',
        ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
         } else {

        $kel = Keluarga::find($id);
        $kel->no_kk = $request->no_kk;
        $kel->alamat = $request->alamat;
        $kel->rt_id = $request->rt_id;
        $kel->rw_id = $request->rw_id;
        $kel->save();
        
        return redirect()->route('keluarga.show', [$kel->id_kk])->with('sukses', 'Berhasil mengubah data keluarga');
       
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
        $pend = Penduduk::where("kk_id",$id)->delete();
        $kel = Keluarga::destroy($id);
        if ($kel) {
            return redirect('/keluarga')->with('hapus', 'Berhasil menghapus data keluarga.');
        }
    }

    public function penduduk(Request $request, $id)
    {
        $kel = Keluarga::find($id);
        $rt = Rt::pluck('rt','id_rt');
        $rw = Rw::pluck('rw','id_rw');

        $kk = Keluarga::find($request->id);
        $penduduk = new Penduduk();
        
        $goldars = Goldar::pluck('goldar', 'id_goldar');        
        $jks = Jk::all(['id_jk', 'jk']);

        $agama = Agama::pluck('agama','id_agama');
        $keluarga = Keluarga::pluck('no_kk','id_kk');
        $tl = Tempatlahir::pluck('tl','id_tl');
        $pekerjaan = Pekerjaan::pluck('pekerjaan','id_pekerjaan');
        $pendidikan = Pendidikan::pluck('pendidikan','id_pendidikan');
        $shdk = Shdk::where('shdk','<>', 'Kepala Keluarga')->pluck('shdk','id_shdk');
        
        return view('keluarga.tambahpenduduk',compact('kk','penduduk','agama','keluarga','tl','pekerjaan','pendidikan','shdk','jks','goldars', 'rt', 'rw', 'kel'));
    }

    public function pendudukstore(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'kk_id' => 'required',
            'nik' => 'required|unique:penduduks',
            'nama' => 'required',
            'jk_id' => 'required',
            'tl_id' => 'required',
            'tlahir' => 'required',
            'goldar_id' => 'required',
            'agama_id' => 'required',
            'pendidikan_id' => 'required',
            'pekerjaan_id' => 'required',
            'status_kawin' => 'required',
            'shdk_id' => 'required',
            'nama_ayah' => 'required',
            'nama_ibu' => 'required',
        ]
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
         } else {
            
            $penduduk = new Penduduk();
            
            $penduduk->nik = $request->nik;
            $penduduk->kk_id = $request->kk_id;
            $penduduk->nama = $request->nama;
            $penduduk->jk_id = $request->jk_id;
            $penduduk->tl_id = $request->tl_id;
            $penduduk->tlahir = $request->tlahir;
            $penduduk->goldar_id = $request->goldar_id;
            $penduduk->agama_id = $request->agama_id;
            $penduduk->pendidikan_id = $request->pendidikan_id;
            $penduduk->pekerjaan_id = $request->pekerjaan_id;
            $penduduk->status_kawin = $request->status_kawin;
            $penduduk->shdk_id = $request->shdk_id;
            $penduduk->nama_ayah = $request->nama_ayah;
            $penduduk->nama_ibu = $request->nama_ibu;
            $penduduk->akta_lahir = $request->akta_lahir;
            $penduduk->akta_lahir_no = $request->akta_lahir_no;
            $penduduk->akta_kawin = $request->akta_kawin;
            $penduduk->akta_kawin_no = $request->akta_kawin_no;
            $penduduk->akta_cerai = $request->akta_cerai;
            $penduduk->akta_cerai_no = $request->akta_cerai_no;
            $penduduk->save();

            return redirect()->route('keluarga.show', [$request->kk_id])->with('sukses', 'Berhasil menambah data penduduk pada KK');
        }
    }
}