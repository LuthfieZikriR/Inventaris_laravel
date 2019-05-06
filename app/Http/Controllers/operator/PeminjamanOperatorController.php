<?php

namespace App\Http\Controllers\operator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\pegawai;
use App\inventaris;
use App\peminjaman;
use App\detail_pinjam;
use App\barang_rusak;
use DB;

class PeminjamanOperatorController extends Controller
{
    public function tampil()
    {
    	$pegawai = pegawai::all();
    	$inventaris = inventaris::all();
    	$peminjaman = peminjaman::all();
    	return view('operator.peminjaman', compact('pegawai', 'inventaris', 'peminjaman'));
    }

    public function listbarang($id_peminjaman)
    {
    	$peminjaman = peminjaman::where('id_peminjaman', $id_peminjaman)->first();
    	$barang = DB::table('detail_pinjams')->where('id_peminjaman', $id_peminjaman)->join('inventaris', 'detail_pinjams.id_inventaris','=', 'inventaris.id_inventaris')->select('detail_pinjams.*','inventaris.nama')->get('');
    	return view('operator.listbarang', compact('peminjaman', 'barang'));
    }

    public function done(Request $req, $id_peminjaman)
    {
    	peminjaman::where('id_peminjaman', $id_peminjaman)->update([
    		'status_peminjaman'=>'sudah',
    		'tanggal_kembali'=>date('Y-m-d')
    	]);
    	$no = 0;
    	foreach (detail_pinjam::where('id_peminjaman', $id_peminjaman)->get() as $key) {
    		$inventaris = inventaris::where('id_inventaris', $key->id_inventaris)->first();
    		$stok = $inventaris->stok + $key->stok;
    		if ($req->rusak[$no]!=0) {
    			barang_rusak::create([
    				'id_inventaris'=>$key->id_inventaris,
    				'stok'=>$req->rusak[$no]
    			]);
    			$stok = $inventaris->stok + ($key->stok - $req->rusak[$no]);
    		}
    		inventaris::where('id_inventaris', $key->id_inventaris)->update([
    			'stok'=>$stok
    		]);
    		$no++;
    	}
    	return redirect('operator/peminjamanOperator')->with('pesan', 'Transaksi Berhasil');
    }
}
