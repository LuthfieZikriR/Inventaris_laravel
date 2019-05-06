<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pegawai;

class PegawaiController extends Controller
{
    function tampil()
    {
    	$pegawai = pegawai::all();
    	return view('admin.inputPegawai', compact('pegawai'));
    }

    function simpan(request $request)
    {
    	pegawai::create([
    		'nip'=>$request->nip,
    		'nama_pegawai'=>$request->nama_pegawai,
    		'username'=>$request->username,
    		'password'=>$request->password,
    		'alamat'=>$request->alamat,
    	]);
    	return redirect('pegawai');
    }

    function hapus($id_pegawai)
    {
    	pegawai::where('id_pegawai', $id_pegawai)->delete();
    	return back();
    }

    function update(request $request, $id_pegawai)
    {
    	pegawai::where('id_pegawai', $id_pegawai)->update([
    		'nip'=>$request->nip,
    		'nama_pegawai'=>$request->nama_pegawai,
    		'username'=>$request->username,
    		'password'=>$request->password,
    		'alamat'=>$request->alamat,
    	]);

    	return redirect('pegawai');
    }
}
