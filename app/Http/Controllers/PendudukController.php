<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penduduk;
use App\Keluarga;
use App\Jk;
use App\Tempatlahir;
use App\Agama;
use App\Goldar;
use App\Pekerjaan;
use App\Pendidikan;
use App\Shdk;
use Validator, Redirect;

class PendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cari = $request->get('search');
        $kaka = $request->get('kk');
        $keluarga = Keluarga::pluck('no_kk','id_kk');
        $penduduk = Penduduk::join('keluargas','penduduks.kk_id','=','keluargas.id_kk')
            ->join('jks','penduduks.jk_id','=','jks.id_jk')
            ->join('shdks','penduduks.shdk_id','=','shdks.id_shdk')
            ->where('nama','LIKE','%'.$cari.'%')
            ->orwhere('nik','LIKE','%'.$cari.'%')
            ->orwhere('keluargas.no_kk','LIKE','%'.$cari.'%')
            ->orwhere('jks.jk','LIKE','%'.$cari.'%')
            ->orwhere('shdks.shdk','LIKE','%'.$cari.'%')
            ->paginate(20);
        return view('penduduk.index',compact('penduduk','keluarga','kaka'));
    }

    /*$query->where('name', 'LIKE', '%'. $input .'%')->orwhere('firstname', 'LIKE', '%'. $input .'%')->get();
*/
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $kk = Keluarga::find($request->id);
        $penduduk = new Penduduk();

        $keluarga2 = Keluarga::join('penduduks', function($join){
                $join->on('penduduks.kk_id','=', 'keluargas.id_kk')
                    ->where('penduduks.shdk_id','=', 1)
            ;})->select('no_kk', 'penduduks.nama', 'id_kk')->get();

        $goldars = Goldar::pluck('goldar', 'id_goldar');        
        $jks = Jk::all(['id_jk', 'jk']);

        $agama = Agama::pluck('agama','id_agama');
        $keluarga = Keluarga::pluck('no_kk','id_kk');
        $tl = Tempatlahir::pluck('tl','id_tl');
        $pekerjaan = Pekerjaan::pluck('pekerjaan','id_pekerjaan');
        $pendidikan = Pendidikan::pluck('pendidikan','id_pendidikan');
        $shdk = Shdk::where("id_shdk", '<>', 1)->pluck('shdk','id_shdk');
        
        return view('penduduk.create',compact('kk','penduduk','agama','keluarga','tl','pekerjaan','pendidikan','shdk','jks','goldars', 'keluarga2'));
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

            return redirect()->route('penduduk.show', [$penduduk->id_penduduk])->with('sukses', 'Berhasil menambah data penduduk');
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
        $pend = Penduduk::find($id);
        $pend->tlahir = date('d M Y', strtotime($pend->tlahir));
        
        return view('penduduk.show',compact('pend'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $penduduk = Penduduk::find($id);
        $goldars = Goldar::pluck('goldar', 'id_goldar');        
        $jks = Jk::all(['id_jk', 'jk']);

        $agama = Agama::pluck('agama','id_agama');
        $keluarga = Keluarga::pluck('no_kk','id_kk');
        $tl = Tempatlahir::pluck('tl','id_tl');
        $pekerjaan = Pekerjaan::pluck('pekerjaan','id_pekerjaan');
        $pendidikan = Pendidikan::pluck('pendidikan','id_pendidikan');
       
        $shdk = Shdk::where("id_shdk", '<>', 1)->pluck('shdk','id_shdk');

        return view('penduduk.edit',compact('penduduk','agama','keluarga','tl','pekerjaan','pendidikan','shdk','jks','goldars'));
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
            
            'nik' => 'required',
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

        $penduduk = Penduduk::find($id);
        
        $penduduk->nik = $request->nik;
        $penduduk->kk_id = $request->kk_id;
        $penduduk->nama = $request->nama;
        $penduduk->jk_id = $request->jk_id;
        $penduduk->tl_id = $request->tl_id;
        $penduduk->goldar_id = $request->goldar_id;
        $penduduk->agama_id = $request->agama_id;
        $penduduk->pendidikan_id = $request->pendidikan_id;
        $penduduk->pekerjaan_id = $request->pekerjaan_id;
        $penduduk->status_kawin = $request->status_kawin;
        $penduduk->shdk_id = $request->shdk_id;
        $penduduk->nama_ayah = $request->nama_ayah;
        $penduduk->nama_ibu = $request->nama_ibu;
        $penduduk->akta_lahir = $request->akta_lahir;
        $penduduk->akta_kawin = $request->akta_kawin;
        // $penduduk->akta_kawin_no = $request->akta_kawin_no;
        $penduduk->akta_cerai = $request->akta_cerai;
        // $penduduk->akta_cerai_no = $request->akta_cerai_no;
       
        if ($penduduk->akta_lahir == "Tidak Ada") {
            $penduduk->akta_lahir_no = NULL;
        }else{
            $penduduk->akta_lahir_no = $request->akta_lahir_no;
        }
        
        if ($penduduk->akta_kawin == "Tidak Ada") {
            $penduduk->akta_kawin_no = NULL;
        }else{
            $penduduk->akta_kawin_no = $request->akta_kawin_no;
        }

        if ($penduduk->akta_cerai == "Tidak Ada") {
            $penduduk->akta_cerai_no = NULL;
        }else{
            $penduduk->akta_cerai_no = $request->akta_cerai_no;
        }
        $penduduk->save();

        return redirect()->route('penduduk.show', [$penduduk->id_penduduk])->with('sukses', 'Berhasil mengubah data penduduk');
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
        $penduduk = Penduduk::destroy($id);
        if ($penduduk) {
            return redirect('/penduduk')->with('hapus', 'Berhasil menghapus data penduduk.');
        }
    }
}
