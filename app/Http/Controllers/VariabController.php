<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Variab;
use App\Kriter;
use App\Bobot;

class VariabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vari = Variab::all();

        return view('variabel.index',compact('vari'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vari = new Variab;
        $krit = Kriter::pluck('kriteria','id');
        $bob = Bobot::pluck('bobot','id');
        return view('variabel.create',compact('vari','krit','bob'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vari = new Variab;
        $vari->variab = $request->variab;
        $vari->kriter_id = $request->kriter_id;
        $vari->bobot_id = $request->bobot_id;
        $vari->save();

        return redirect()->action('VariabController@index');
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
        $vari = Variab::find($id);
        $krit = Kriter::pluck('kriteria','id');
        $bob = Bobot::pluck('bobot','id');
        return view('variabel.edit',compact('vari','krit','bob'));

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
        $vari = Variab::find($id);
        $vari->variab = $request->variab;
        $vari->kriter_id = $request->kriter_id;
        $vari->bobot_id = $request->bobot_id;
        $vari->save();

        return redirect()->action('VariabController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vari = Variab::destroy($id);
        return redirect()->action('VariabController@index');
    }
}
