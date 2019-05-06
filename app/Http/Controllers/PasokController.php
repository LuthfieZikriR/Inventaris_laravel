<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\inventaris;
use App\pasok;

class PasokController extends Controller
{
    function tampil($id_inventaris)
    {
    	$inventaris = inventaris::where('id_inventaris', $id_inventaris)->first();
    	return view('admin.pasok', compact('inventaris'));
    }

    function tambah(request $request, $id_inventaris){
    	$id_petugas = session('admin')->id_petugas;
    	pasok::create([
    		'kode_inventaris'=>$request->kode_inventaris,
    		'nama'=>$request->nama,
    		'jumlah'=>$request->jumlah,
    		'id_petugas'=>$id_petugas,
    	]);

    	return redirect('inventaris');
    }
}
