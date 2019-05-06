<?php

namespace App\Http\Controllers\pegawai;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\pegawai;
use App\inventaris;
use App\peminjaman;
use App\detail_pinjam;
use App\barang_rusak;
use DB;
class PeminjamanPegawaiController extends Controller
{
    public function tampil()
    {
    	$pegawai = pegawai::all();
    	$inventaris = inventaris::all();
    	$peminjaman = peminjaman::all();
    	return view('pegawai.peminjaman', compact('pegawai', 'inventaris', 'peminjaman'));
    }
}
