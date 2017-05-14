<?php

namespace App\Http\Controllers;
use App\Rw;
use App\Keluarga;
use DB;

use Illuminate\Http\Request;
use Validator, Redirect;

class RwController extends Controller
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
            'rw' => 'unique:rws',
        ]);

        if ($validator->fails()) {
            return redirect()->action('KependudukanController@index')->withErrors($validator)->withInput();
         } else {
            $rw = new Rw();
            $rw->rw = $request->rw;
            $rw->save();
            return redirect()->action('KependudukanController@index')->with('sukses', 'Berhasil menambah data master RW');
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
            'rw' => 'unique:rws',
        ]);

        if ($validator->fails()) {
            return redirect()->action('KependudukanController@index')->withErrors($validator)->withInput();
         } else {
            $rw = Rw::find($request->id_rw);
            $rw->rw = $request->rw;
            $rw->save();
            return redirect()->action('KependudukanController@index')->with('sukses', 'Berhasil mengubah data master RW!');
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
        $kel = Keluarga::where("rw_id",$id)->delete();
        $rw= Rw::destroy($id);
        if ($rw) {
            return redirect('/kependudukan')->with('sukses', 'Berhasil menghapus data master RW.');
        }
    }
}
