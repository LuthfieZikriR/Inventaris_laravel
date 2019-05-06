<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\level;
use App\petugas;

class PetugasController extends Controller
{
    function tampil()
    {
    	$level = level::all();
    	$petugas = petugas::all();
    	return view('admin.inputPetugas', compact('level', 'petugas'));
    }

    function simpan(request $request)
    {
    	petugas::create([
    		'nama_petugas'=>$request->nama_petugas,
    		'username'=>$request->username,
    		'password'=>$request->password,
    		'id_level'=>$request->id_level,
    	]);

    	return redirect('petugas');
    }

    function hapus($id_petugas)
    {
    	petugas::where('id_petugas', $id_petugas)->delete();
    	return back();
    }
    
    function update(request $request, $id_petugas)
    {
    	petugas::where('id_petugas', $id_petugas)->update([
    		'nama_petugas'=>$request->nama_petugas,
    		'username'=>$request->username,
    		'password'=>$request->password,
    		'id_level'=>$request->id_level,
    	]);

    	return redirect('petugas');
    }
}
