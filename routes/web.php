<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});

//INILOGINADMINDANPETUGAS
Route::get('/login', function(){
	return view('admin.login');
});

Route::post('do-login', 'loginController@login');
Route::get('logout', 'loginController@logout');
Route::get('/dashboardAdmin', function() {
	return view('admin.dashboard');
});

Route::get('/dashboardOperator', function () {
    return view('operator.dashboard');
});

//INPUTDATA
Route::group(['prefix'=>'jenis_barang'], function(){
	Route::get('/', 'jenisBarangController@tampil');
	Route::post('/simpan', 'jenisBarangController@simpan');
	Route::get('/hapus/{id_jenis}', 'jenisBarangController@hapus');
	Route::patch('/update/{id_jenis}', 'jenisBarangController@update');
});

Route::group(['prefix'=>'ruangan'], function(){
	Route::get('/', 'ruanganController@tampil');
	Route::post('/simpan', 'ruanganController@simpan');
	Route::get('/hapus/{id_ruang}', 'ruanganController@hapus');
	Route::patch('/update/{id_ruang}', 'ruanganController@update');
});

Route::group(['prefix'=>'petugas'], function(){
	Route::get('/', 'petugasController@tampil');
	Route::post('/simpan', 'petugasController@simpan');
	Route::get('/hapus/{id_petugas}', 'petugasController@hapus');
	Route::patch('/update/{id_petugas}', 'petugasController@update');
});

Route::group(['prefix'=>'pegawai'], function(){
	Route::get('/', 'pegawaiController@tampil');
	Route::post('/simpan', 'pegawaiController@simpan');
	Route::get('/hapus/{id_pegawai}', 'pegawaiController@hapus');
	Route::patch('/update/{id_pegawai}', 'pegawaiController@update');
});

Route::group(['prefix'=>'inventaris'], function(){
	Route::get('/', 'inventarisController@tampil');
	Route::post('/simpan', 'inventarisController@simpan');
	Route::get('/hapus/{id_inventaris}', 'inventarisController@hapus');
	Route::get('/edit/{id_inventaris}', 'inventarisController@edit');
	Route::patch('/update/{id_inventaris}', 'inventarisController@update');
});

Route::group(['prefix'=>'pasok'], function(){
	Route::get('/{id_inventaris}', 'pasokController@tampil');
	Route::post('/tambah/{id_inventaris}', 'pasokController@tambah');
});

//PEMINJAMAN
Route::group(['prefix'=>'peminjaman'], function(){
	Route::get('/', 'peminjamanController@tampil');
	Route::post('/proses','peminjamanController@proses');
	Route::get('hapus/{id_peminjaman}', 'peminjamanController@hapus');
	Route::post('done/{id}', 'peminjamanController@done');
	Route::get('barang_rusak', 'inventarisController@barang_rusak');
	Route::get('done_rusak/{id}', 'inventarisController@done_rusak');	

});

//STATUS
Route::get('/updacc/{id_peminjaman}', 'peminjamanController@acc');
Route::get('/updstatus/{id_peminjaman}', 'peminjamanController@listbarang');
//LOGINPEGAWAI
Route::get('/loginPegawai', function(){
	return view('pegawai.loginPegawai');
});
Route::post('do-loginPegawai', 'loginController@loginPegawai');
Route::get('logoutPegawai', 'loginController@logoutPegawai');
Route::get('/dashboardPegawai', function(){
	return view('pegawai.dashboard');
});

//PEMINJAMANPEGAWAI
Route::group(['prefix'=>'pegawai/peminjamanPegawai'], function(){
	Route::get('/', 'pegawai\peminjamanPegawaiController@tampil');
});

//PEMINJAMANOPERATOR
Route::group(['prefix'=>'operator/peminjamanOperator'], function(){
	Route::get('/', 'operator\peminjamanOperatorController@tampil');
	Route::get('/updstatus/{id_peminjaman}', 'operator\peminjamanOperatorController@listbarang');
	Route::post('done/{id_peminjaman}', 'operator\peminjamanOperatorController@done');
});

//LAPORAN
Route::group(['prefix'=>'laporan'], function() {
	Route::get('/peminjaman', 'peminjamanController@laporan');
	Route::get('/stok', 'inventarisController@laporan');
	Route::get('/barang_rusak', 'inventarisController@laporanBarangRusak');
});
