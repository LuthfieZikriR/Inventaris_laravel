@extends('layouts.layoutAdmin');
@section('content');
        <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Daftar Pegawai</h2>
                            <button type="submit" class="btn btn-primary right" data-target="#defaultModalPegawai" data-toggle="modal">Tambah</button>
                        </div>
                        <div class="body table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nip</th>
                                        <th>Nama Pegawai</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>Alamat</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pegawai as $row)
                                    <tr>
                                        <td>{{$row->nip}}</td>
                                        <td>{{$row->nama_pegawai}}</td>
                                        <td>{{$row->username}}</td>
                                        <td>{{$row->password}}</td>
                                        <td>{{$row->alamat}}</td>
                                        <td>
                                            <a href="{{'pegawai/edit/'.$row->id_pegawai}}" class="btn btn-primary" data-toggle="modal" data-target="#defaultModalEditPegawai{{$row->id_pegawai}}">Edit</a>
                                            <a href="{{'pegawai/hapus/'.$row->id_pegawai}}" class="btn btn-danger">Hapus</a>
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
<div class="modal fade" id="defaultModalPegawai" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Tambah Pegawai</h4>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="{{'pegawai/simpan'}}">
                                @csrf
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" name="nip" class="form-control" value="">
                                        <label class="form-label">NIP</label>
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="nama_pegawai" class="form-control">
                                        <label class="form-label">Nama Pegawai</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="username" class="form-control">
                                        <label class="form-label">Username</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="password" class="form-control">
                                        <label class="form-label">Password</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="alamat" class="form-control">
                                        <label class="form-label">Alamat</label>
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
@foreach($pegawai as $row)
<div class="modal fade" id="defaultModalEditPegawai{{$row->id_pegawai}}" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Update Pegawai</h4>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="{{'pegawai/update/'.$row->id_pegawai}}">
                                @csrf @method('patch')
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" name="nip" class="form-control" value="{{$row->nip}}">
                                        <label class="form-label">NIP</label>
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="nama_pegawai" class="form-control" value="{{$row->nama_pegawai}}">
                                        <label class="form-label">Nama Pegawai</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="username" class="form-control" value="{{$row->username}}">
                                        <label class="form-label">Username</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="password" class="form-control" value="{{$row->password}}">
                                        <label class="form-label">Password</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="alamat" class="form-control" value="{{$row->alamat}}">
                                        <label class="form-label">Alamat</label>
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
