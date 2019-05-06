<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pegawai;
use App\inventaris;
use App\peminjaman;
use App\detail_pinjam;
use App\barang_rusak;
use DB;
class PeminjamanController extends Controller
{
    public function tampil()
    {
    	$pegawai = pegawai::all();
    	$inventaris = inventaris::all();
    	$peminjaman = peminjaman::all();
    	return view('admin.peminjaman', compact('pegawai', 'inventaris', 'peminjaman'));
    }

    public function proses(Request $req)
    {
    	$no = 0;
    	foreach ($req->id_inventaris as $key) {
    		$inventaris = inventaris::where('id_inventaris', $key)->first()->stok;
    		if ($inventaris < $req->stok[$no]) {
    			return back()->with('pesan', 'Stok Tidak Memadai');
    		}
    		$no++;
    	}
    	if (!$req->id_pegawai) {
    		peminjaman::create([
    			'tanggal_pinjam'=>$req->tanggal_pinjam,
    			'tanggal_kembali'=>$req->tanggal_kembali,
    			'status_peminjaman'=>'menunggu',
    			'id_pegawai'=>session('pegawai')->id_pegawai,
    		]);
    	}else{
    		peminjaman::create([
    			'tanggal_pinjam'=>$req->tanggal_pinjam,
    			'tanggal_kembali'=>$req->tanggal_kembali,
    			'status_peminjaman'=>'menunggu',
    			'id_pegawai'=>$req->id_pegawai,
    		]);
    	}
    	$no=0;
    	foreach ($req->id_inventaris as $key) {
    		detail_pinjam::create([
    			'id_inventaris'=>$key,
    			'id_peminjaman'=>peminjaman::all()->last()->id_peminjaman,
    			'stok'=>$req->stok[$no],
    		]);
    		$no++;
    	}
    	return back()->with('pesan','sukses');
    }

    public function acc($id_peminjaman)
    {
    	$status_acc = "sedang";
    	peminjaman::where('id_peminjaman', $id_peminjaman)->update([
    		'status_peminjaman'=>$status_acc,
    	]);

    	foreach (detail_pinjam::where('id_peminjaman', $id_peminjaman)->get() as $key) {
    		$old = inventaris::where('id_inventaris', $key->id_inventaris)->get()[0]->stok;
    		$sisa = $old - $key->stok;
    		inventaris::where('id_inventaris', $key->id_inventaris)->update([
    			'stok'=>$sisa
    		]);
    	}
    	return back();
    }

    public function listbarang($id_peminjaman)
    {
    	$peminjaman = peminjaman::where('id_peminjaman', $id_peminjaman)->first();
        $barang = DB::table('detail_pinjams')->where('id_peminjaman', $id_peminjaman)->join('inventaris', 'detail_pinjams.id_inventaris', '=', 'inventaris.id_inventaris')->select('detail_pinjams.*', 'inventaris.nama')->get('');
        return view('admin.listbarang', compact('peminjaman', 'barang'));
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
            $stok = $inventaris->jumlah + $key->jumlah;
            if ($req->rusak[$no]!=0) {
                barang_rusak::create([
                    'id_inventaris'=>$key->id_inventaris,
                    'stok'=>$req->rusak[$no]
                ]);

                $stok = $inventaris->jumlah + ($key->jumlah - $req->rusak[$no]);
            }

            inventaris::where('id_inventaris', $key->id_inventaris)->update([
                'stok'=>$stok
            ]);
            $no++;
        }

        return redirect('peminjaman')->with('pesan', 'transaksi berhasil');
    }

    public function laporan()
    {
        $lap_peminjaman = DB::table('peminjamen')->join('detail_pinjams', 'detail_pinjams.id_peminjaman', '=', 'peminjamen.id_peminjaman')->join('inventaris', 'inventaris.id_inventaris', '=', 'detail_pinjams.id_inventaris')->join('pegawais', 'pegawais.id_pegawai', '=', 'peminjamen.id_pegawai')->select('pegawais.nama_pegawai', 'inventaris.nama', 'peminjamen.tanggal_pinjam', 'peminjamen.tanggal_kembali', 'detail_pinjams.stok')->get();
        return view('laporan.laporanPeminjaman', compact('lap_peminjaman'));
    }
}
