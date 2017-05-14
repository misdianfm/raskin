<?php

namespace App\Http\Controllers;
use App\Shdk;
use App\Penduduk;
use DB;

use Illuminate\Http\Request;
use Validator, Redirect;

class ShdkController extends Controller
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
            'shdk' => 'unique:shdks',
        ]);

        if ($validator->fails()) {
            return redirect()->action('KependudukanController@index')->withErrors($validator)->withInput();
         } else {
            $shdk = new Shdk();
            $shdk->shdk = $request->shdk;
            $shdk->save();
            return redirect()->action('KependudukanController@index')->with('sukses', 'Berhasil menambah data master status hubungan dalam keluarga');
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
            'shdk' => 'unique:shdks',
        ]);

        if ($validator->fails()) {
            return redirect()->action('KependudukanController@index')->withErrors($validator)->withInput();
         } else {

            $shdk = Shdk::find($request->id_shdk);
            $shdk->shdk = $request->shdk;
            $shdk->save();
            return redirect()->action('KependudukanController@index')->with('sukses', 'Berhasil mengubah data master status hubungan dalam keluarga!');
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
        $pend = Penduduk::where("shdk_id",$id)->delete();
        $shdk= Shdk::destroy($id);
        if ($shdk) {
            return redirect('/kependudukan')->with('sukses', 'Berhasil menghapus data master status hubungan dalam keluarga.');
        }
    }
}
