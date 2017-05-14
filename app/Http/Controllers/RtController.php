<?php

namespace App\Http\Controllers;
use App\Rt;
use App\Keluarga;
use DB;

use Illuminate\Http\Request;
use Validator, Redirect;

class RtController extends Controller
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
            'rt' => 'unique:rts',
        ]);

        if ($validator->fails()) {
            return redirect()->action('KependudukanController@index')->withErrors($validator)->withInput();
         } else {
            $rt = new Rt();
            $rt->rt = $request->rt;
            $rt->save();
            return redirect()->action('KependudukanController@index')->with('sukses', 'Berhasil menambah data master RT');
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
            'rt' => 'unique:rts',
        ]);

        if ($validator->fails()) {
            return redirect()->action('KependudukanController@index')->withErrors($validator)->withInput();
         } else {

            $rt = Rt::find($request->id_rt);
            $rt->rt = $request->rt;
            $rt->save();
            return redirect()->action('KependudukanController@index')->with('sukses', 'Berhasil mengubah data master RT!');
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
        $kel = Keluarga::where("rt_id",$id)->delete();
        $rt= Rt::destroy($id);
        if ($rt) {
            return redirect('/kependudukan')->with('sukses', 'Berhasil menghapus data master RT.');
        }
    }
}
