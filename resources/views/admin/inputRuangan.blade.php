@extends('layouts.layoutAdmin');
@section('content');
        <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Daftar Ruangan</h2>
                            <button type="submit" class="btn btn-primary right" data-target="#defaultModalRuangan" data-toggle="modal">Tambah</button>
                        </div>
                        <div class="body table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Kode Ruang</th>
                                        <th>Nama Ruang</th>
                                        <th>Keterangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     @foreach($ruangan as $row)
                                    <tr>
                                        <td>{{$row->kode_ruang}}</td>
                                        <td>{{$row->nama_ruang}}</td>
                                        <td>{{$row->keterangan}}</td>
                                        <td>
                                            <a href="{{'ruangan/edit'}}" class="btn btn-primary" data-toggle="modal" data-target="#defaultModalEditRuangan{{$row->id_ruang}}">Edit</a>
                                            <a href="{{'ruangan/hapus/'.$row->id_ruang}}" class="btn btn-danger">Hapus</a>
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
    <div class="modal fade" id="defaultModalRuangan" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Tambah Ruangan</h4>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="{{'ruangan/simpan'}}">
                                @csrf
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="kode_ruang" class="form-control" readonly="" value="{{$kode}}">
                                        <label class="form-label">Kode Ruang</label>
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="nama_ruang" class="form-control">
                                        <label class="form-label">Nama Ruang</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="keterangan" class="form-control">
                                        <label class="form-label">Keterangan</label>
                                    </div>
                                </div>
                                <br>
                            
                        </div> 
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary waves-effect">Simpan</button>
                            <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Keluar</button>
                        </div>
                        </form>
                    </div>
                </div>
</div>
@foreach($ruangan as $row)
<div class="modal fade" id="defaultModalEditRuangan{{$row->id_ruang}}" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Update Ruangan</h4>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="{{'ruangan/update/'.$row->id_ruang}}">
                                @csrf @method('patch')
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="kode_ruang" class="form-control" readonly="" value="{{$row->kode_ruang}}">
                                        <label class="form-label">Kode Ruang</label>
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="nama_ruang" class="form-control" value="{{$row->nama_ruang}}">
                                        <label class="form-label">Nama Ruang</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="keterangan" class="form-control" value="{{$row->keterangan}}">
                                        <label class="form-label">Keterangan</label>
                                    </div>
                                </div>
                                <br>
                            
                        </div> 
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary waves-effect">Update</button>
                            <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Keluar</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
@endforeach
@endsection
