<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lim;

class LimController extends Controller
{
    public function update(Request $request, $id)
    {
    	$lims = Lim::find($request->id);
    	$lims->lim = $request->lim;
    	$lims->save();
    	return redirect('/home')->with('sukses', 'Berhasil mengubah kuota!');
    }
}
