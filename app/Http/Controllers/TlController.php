<?php

namespace App\Http\Controllers;
use App\Tempatlahir;
use App\Penduduk;
use DB;

use Illuminate\Http\Request;
use Validator, Redirect;

class TlController extends Controller
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
            'tl' => 'unique:tempatlahirs',
        ]);

        if ($validator->fails()) {
            return redirect()->action('KependudukanController@index')->withErrors($validator)->withInput();
         } else {
            $tl = new Tempatlahir();
            $tl->tl = $request->tl;
            $tl->save();
            return redirect()->action('KependudukanController@index')->with('sukses', 'Berhasil menambah data master Tempat Lahir!');
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
            'tl' => 'unique:tempatlahirs',
        ]);

        if ($validator->fails()) {
            return redirect()->action('KependudukanController@index')->withErrors($validator)->withInput();
        } else {

        $tl = Tempatlahir::find($request->id_tl);
        $tl->tl = $request->tl;
        $tl->save();
        return redirect()->action('KependudukanController@index')->with('sukses', 'Berhasil mengubah data master Tempat Lahir!');
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
        $pend = Penduduk::where("tl_id",$id)->delete();
        $tl = Tempatlahir::destroy($id);
        if ($tl) {
            return redirect('/kependudukan')->with('sukses', 'Berhasil menghapus data master tempat lahir.');
        }
    }
}
