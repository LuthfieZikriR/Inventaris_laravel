@extends('layouts.layoutAdmin');
@section('content');
        <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Tambah Inventaris</h2>
                        </div>
                        <div class="body">
                            <form method="post" action="{{'inventaris/simpan'}}">
                                @csrf
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="kode_inventaris" class="form-control" readonly="" value="{{$kode}}">
                                        <label class="form-label">Kode Inventaris</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="nama" class="form-control">
                                        <label class="form-label">Nama</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" name="stok" class="form-control">
                                        <label class="form-label">stok</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" name="jumlah" class="form-control">
                                        <label class="form-label">Jumlah</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                        <div class="row clearfix">
                                        <div class="col-sm-12">
                                            <select class="form-control show-tick" name="kondisi">
                                                <option value="">-- Pilih Kondisi --</option>
                                                <option value="Baik" selected>Baik</option>
                                                <option value="Rusak">Rusak</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="keterangan" class="form-control">
                                        <label class="form-label">Keterangan</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="row clearfix">
                                        <div class="col-sm-12">
                                            <select class="form-control show-tick" name="id_jenis">
                                                <option value="">-- Pilih Jenis Barang --</option>
                                                @foreach($jenisBarang as $row)
                                                <option value="{{$row->id_jenis}}">{{$row->nama_jenis}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="row clearfix">
                                        <div class="col-sm-12">
                                            <select class="form-control show-tick" name="id_ruang">
                                                <option value="">-- Pilih Ruangan --</option>
                                                @foreach($ruangan as $row)
                                                <option value="{{$row->id_ruang}}">{{$row->nama_ruang}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                 </div>
                                 <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                                <br>  
                        </div> 
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Daftar Inventaris</h2>
                        </div>
                        <div class="body table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Kode</th>
                                        <th>Nama</th>
                                        <th>Stok</th>
                                        <th>Jumlah</th>
                                        <th>Jenis</th>
                                        <th>Ruangan</th>
                                        <th>Penanggung Jawab</th>
                                        <th>Tanggal Masuk</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($inventaris as $row)
                                    <tr>
                                        <td>{{$row->kode_inventaris}}</td>
                                        <td>{{$row->nama}}</td>
                                        <td>{{$row->stok}}</td>
                                        <td>{{$row->jumlah}}</td>
                                        <td>
                                            @foreach($jenisBarang as $list)
                                            @if($row->id_jenis == $list->id_jenis)
                                            {{$list->nama_jenis}}
                                            @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($ruangan as $list)
                                            @if($row->id_ruang == $list->id_ruang)
                                            {{$list->nama_ruang}}
                                            @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($petugas as $e)
                                            @if($row->id_petugas == $e->id_petugas)
                                            {{$e->nama_petugas}}
                                            @endif
                                            @endforeach
                                        </td>
                                        <td>{{$row->created_at}}</td>
                                        <td>
                                            <a href="{{'inventaris/edit/'.$row->id_inventaris}}" class="btn btn-primary">Edit</a>
                                            <a href="{{'pasok/'.$row->id_inventaris}}" class="btn btn-warning">Pasok</a>
                                            <a href="{{'inventaris/hapus/'.$row->id_inventaris}}" class="btn btn-danger">Hapus</a>
                                           </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection     