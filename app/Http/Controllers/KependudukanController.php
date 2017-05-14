<?php

namespace App\Http\Controllers;
use App\Tempatlahir;
use App\Agama;
use App\Pendidikan;
use App\Pekerjaan;
use App\Shdk;
use App\Rt;
use App\Rw;
use DB;

use Illuminate\Http\Request;
use Validator, Redirect;

class KependudukanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tl = Tempatlahir::paginate(5,['*'],'tempatlahir');
        $agama = Agama::paginate(5,['*'],'agama');
        $pendidikan = Pendidikan::paginate(5,['*'],'pendidikan');
        $pekerjaan = Pekerjaan::paginate(5,['*'],'pekerjaan');
        $shdk = Shdk::paginate(5,['*'],'shdk');
        $rt = Rt::paginate(5,['*'],'rt');
        $rw = Rw::paginate(5,['*'],'rw');

        return view('kependudukan.index',compact('tl','agama','pendidikan','pekerjaan','shdk','rt','rw'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
