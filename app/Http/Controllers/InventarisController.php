<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\jenis_barang;
use App\inventaris;
use App\ruangan;
use App\petugas;
use App\level;
use App\barang_rusak;
use DB;

class InventarisController extends Controller
{
    function tampil()
    {
    	$jmlh_row_tb = substr(inventaris::max('kode_inventaris'), 1, 4) + 1;
    	$kode = 'B'.str_pad($jmlh_row_tb, 4, 0, STR_PAD_LEFT);
    	$jenisBarang = jenis_barang::all();
    	$inventaris = inventaris::all();
    	$ruangan = ruangan::all();
    	$level = level::all();
    	$petugas = petugas::all();
    	return view('admin.inputInventaris', compact('kode', 'jenisBarang', 'level', 'inventaris', 'ruangan', 'petugas'));
    }

    function simpan(request $request)
    {
    	inventaris::create([
    		'kode_inventaris'=>$request->kode_inventaris,
    		'nama'=>$request->nama,
    		'kondisi'=>$request->kondisi,
    		'keterangan'=>$request->keterangan,
            'stok'=>$request->stok,
            'jumlah'=>$request->jumlah,
    		'id_jenis'=>$request->id_jenis,
    		'id_ruang'=>$request->id_ruang,
    		'id_petugas'=>session()->get('admin')->id_petugas,
    	]);

    	return redirect('inventaris')->with('pesan', 'Berhasil');
    }
    
    function hapus($id_inventaris)
    {
    	inventaris::where('id_inventaris', $id_inventaris)->delete();
    	return back();
    }

    function edit($id_inventaris)
    {
    	$jenisBarang = jenis_barang::all();
    	$ruangan = ruangan::all();
    	$petugas = petugas::all();
    	$inventaris = inventaris::where('id_inventaris', $id_inventaris)->first();
    	return view('admin.editInventaris', compact('inventaris','jenisBarang','ruangan'));
    }

    function update(request $request, $id_inventaris)
    {
    	inventaris::where('id_inventaris', $id_inventaris)->update([
    		'kode_inventaris'=>$request->kode_inventaris,
    		'nama'=>$request->nama,
    		'kondisi'=>$request->kondisi,
    		'keterangan'=>$request->keterangan,
            'stok'=>$request->stok,
    		'jumlah'=>$request->jumlah,
    		'id_jenis'=>$request->id_jenis,
    		'id_ruang'=>$request->id_ruang,
    		'id_petugas'=>session()->get('admin')->id_petugas,
    	]);
    	return redirect('inventaris');
    }

    function barang_rusak()
    {
        $list = DB::table('barang_rusaks')->join('inventaris','inventaris.id_inventaris','=','barang_rusaks.id_inventaris')->select('barang_rusaks.*','inventaris.nama')->get();
        return view('admin.barang_rusak', compact('list'));
    }

    function done_rusak($id)
    {
        $rusak = DB::table('barang_rusaks')->where('id_rusak', $id)->first();
        $inventaris = inventaris::where('id_inventaris', $rusak->id_inventaris)->first();
        $stok = $inventaris->stok + $rusak->stok;
        inventaris::where('id_inventaris', $rusak->id_inventaris)->update([
            'stok'=>$stok
        ]);
        DB::table('barang_rusaks')->where('id_rusak', $id)->delete();
        return back()->with('pesan','Berhasil');

    }

    function laporan()
    {
        $inventaris = inventaris::all();
        return view('laporan.laporanStok', compact('inventaris'));
    }

    function laporanBarangRusak()
    {
        $laporan_rusak = DB::table('barang_rusaks')->join('inventaris', 'inventaris.id_inventaris', '=', 'barang_rusaks.id_inventaris')->select('barang_rusaks.stok', 'inventaris.nama')->get();
        return view('laporan.laporanBarangRusak', compact('laporan_rusak'));
    }
}
