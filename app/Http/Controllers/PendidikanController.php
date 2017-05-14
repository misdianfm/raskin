<?php

namespace App\Http\Controllers;
use App\Pendidikan;
use App\Penduduk;
use DB;

use Illuminate\Http\Request;
use Validator, Redirect;

class PendidikanController extends Controller
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
            'pendidikan' => 'unique:pendidikans',
        ]);

        if ($validator->fails()) {
            return redirect()->action('KependudukanController@index')->withErrors($validator)->withInput();
         } else {
            $pendidikan = new Pendidikan();
            $pendidikan->pendidikan = $request->pendidikan;
            $pendidikan->save();
            return redirect()->action('KependudukanController@index')->with('sukses', 'Berhasil menambah data master pendidikan');
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
            'pendidikan' => 'unique:pendidikans',
        ]);

        if ($validator->fails()) {
            return redirect()->action('KependudukanController@index')->withErrors($validator)->withInput();
         } else {

            $pendidikan = Pendidikan::find($request->id_pendidikan);
            $pendidikan->pendidikan = $request->pendidikan;
            $pendidikan->save();
            return redirect()->action('KependudukanController@index')->with('sukses', 'Berhasil mengubah data master pendidikan!');
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
        $pend = Penduduk::where("pendidikan_id",$id)->delete();
        $pendidikan = Pendidikan::destroy($id);
        if ($pendidikan) {
            return redirect('/kependudukan')->with('sukses', 'Berhasil menghapus data master pendidikan.');
        }
    }
}
