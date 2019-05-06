<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ruangan;

class RuanganController extends Controller
{
    function tampil()
    {
    	$jmlh_row_tb = substr(ruangan::max('kode_ruang'), 1, 4) + 1;
    	$kode = "R".str_pad($jmlh_row_tb, 4, 0, STR_PAD_LEFT);
    	$ruangan = ruangan::all();
    	return view('admin.inputRuangan', compact('ruangan', 'kode'));
    }

    function simpan(request $request)
    {
    	ruangan::create([
    		'kode_ruang'=>$request->kode_ruang,
    		'nama_ruang'=>$request->nama_ruang,
    		'keterangan'=>$request->keterangan,
    	]);

    	return redirect('ruangan');
    }

    function hapus($id_ruang)
    {
    	ruangan::where('id_ruang', $id_ruang)->delete();
    	return back();
    }

    function update(request $request, $id_ruang)
    {
    	ruangan::where('id_ruang', $id_ruang)->update([
    		'kode_ruang'=>$request->kode_ruang,
    		'nama_ruang'=>$request->nama_ruang,
    		'keterangan'=>$request->keterangan,
    	]);

    	return redirect('ruangan');
    }
}
