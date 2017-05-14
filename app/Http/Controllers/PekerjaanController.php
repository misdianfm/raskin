<?php

namespace App\Http\Controllers;
use App\Pekerjaan;
use App\Penduduk;
use DB;

use Illuminate\Http\Request;
use Validator, Redirect;

class PekerjaanController extends Controller
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
            'pekerjaan' => 'unique:pekerjaans',
        ]);

        if ($validator->fails()) {
            return redirect()->action('KependudukanController@index')->withErrors($validator)->withInput();
         } else {
            $pekerjaan = new Pekerjaan();
            $pekerjaan->pekerjaan = $request->pekerjaan;
            $pekerjaan->save();
            return redirect()->action('KependudukanController@index')->with('sukses', 'Berhasil menambah data master pekerjaan');
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
            'pekerjaan' => 'unique:pekerjaans',
        ]);

        if ($validator->fails()) {
            return redirect()->action('KependudukanController@index')->withErrors($validator)->withInput();
         } else {

            $pekerjaan = Pekerjaan::find($request->id_pekerjaan);
            $pekerjaan->pekerjaan = $request->pekerjaan;
            $pekerjaan->save();
            return redirect()->action('KependudukanController@index')->with('sukses', 'Berhasil mengubah data master pekerjaan!');
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
        $pend = Penduduk::where("pekerjaan_id",$id)->delete();
        $pekerjaan= Pekerjaan::destroy($id);
        if ($pekerjaan) {
            return redirect('/kependudukan')->with('sukses', 'Berhasil menghapus data master pekerjaan.');
        }
    }
}
