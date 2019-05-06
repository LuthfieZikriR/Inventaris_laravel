<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\jenis_barang;

class JenisBarangController extends Controller
{
    function tampil()
    {
    	$jmlh_row_tb = substr(jenis_barang::max('kode_jenis'), 1, 4) + 1;
    	$kode = 'J'.str_pad($jmlh_row_tb, 4, 0, STR_PAD_LEFT);
    	$jenisBarang = jenis_barang::all();
    	return view('admin.inputJenisBarang', compact('jenisBarang', 'kode'));
    }

    function simpan(request $request)
    {
    	jenis_barang::create([
    		'kode_jenis'=>$request->kode_jenis,
    		'nama_jenis'=>$request->nama_jenis,
    		'keterangan'=>$request->keterangan,
    	]);
    	return redirect('jenis_barang')->with('pesan','Jenis Barang Berhasil Di Simpan');
    }

    function hapus($id_jenis)
    {
    	jenis_barang::where('id_jenis', $id_jenis)->delete();
    	return back();
    }

    function update(request $request, $id_jenis)
    {
    	jenis_barang::where('id_jenis', $id_jenis)->update([
    		'kode_jenis'=>$request->kode_jenis,
    		'nama_jenis'=>$request->nama_jenis,
    		'keterangan'=>$request->keterangan,
    	]);
    	return redirect('jenis_barang')->with('pesan', 'Jenis Barang Berhasil Diupdate');
    }
}
