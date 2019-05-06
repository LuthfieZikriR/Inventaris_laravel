@extends('layouts.layoutAdmin');
@section('content');
        <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Update Inventaris</h2>
                        </div>
                        <div class="body">
                            <form method="post" action="{{url('inventaris/update/'.$inventaris->id_inventaris)}}">
                                @csrf @method('patch')
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="kode_inventaris" class="form-control" readonly="" value="{{$inventaris->kode_inventaris}}">
                                        <label class="form-label">Kode Inventaris</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="nama" class="form-control" value="{{$inventaris->nama}}">
                                        <label class="form-label">Nama</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" name="stok" class="form-control" value="{{$inventaris->stok}}">
                                        <label class="form-label">Stok</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" name="jumlah" class="form-control" value="{{$inventaris->jumlah}}">
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
                                        <input type="text" name="keterangan" class="form-control" value="{{$inventaris->keterangan}}">
                                        <label class="form-label">Keterangan</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="row clearfix">
                                        <div class="col-sm-12">
                                            <select class="form-control show-tick" name="id_jenis">
                                                <option value="">-- Pilih Jenis Barang --</option>
                                                @foreach($jenisBarang as $row)
                                                @if($inventaris->id_jenis == $row->id_jenis)
                                                <option value="{{$row->id_jenis}}" selected="">{{$row->nama_jenis}}</option>
                                                @else
                                                <option value="{{$row->id_jenis}}">{{$row->nama_jenis}}</option>
                                                @endif
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
                                                @if($inventaris->id_ruang == $row->id_ruang)
                                                <option value="{{$row->id_ruang}}" selected="">{{$row->nama_ruang}}</option>
                                                @else
                                                <option value="{{$row->id_ruang}}">{{$row->nama_ruang}}</option>
                                                @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                 </div>
                                 <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                                <br>  
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
