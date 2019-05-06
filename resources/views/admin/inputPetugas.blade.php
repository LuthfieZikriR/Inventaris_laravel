@extends('layouts.layoutAdmin');
@section('content');
        <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Daftar Petugas</h2>
                            <button type="submit" class="btn btn-primary right" data-target="#defaultModalPetugas" data-toggle="modal">Tambah</button>
                        </div>
                        <div class="body table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Petugas</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>Role</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($petugas as $row)
                                    <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{$row->nama_petugas}}</td>
                                        <td>{{$row->username}}</td>
                                        <td>{{$row->password}}</td>
                                        <td>
                                            @foreach($level as $list)
                                            @if($row->id_level == $list->id_level)
                                            {{$list->nama_level}}
                                            @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            <a href="{{'petugas/edit/'.$row->id_petugas}}" class="btn btn-primary" data-toggle="modal" data-target="#defaultModalEditPetugas{{$row->id_petugas}}">Edit</a>
                                            <a href="{{'petugas/hapus/'.$row->id_petugas}}" class="btn btn-danger">Hapus</a>
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
<div class="modal fade" id="defaultModalPetugas" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Tambah Petugas</h4>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="{{'petugas/simpan'}}">
                                @csrf
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="nama_petugas" class="form-control" value="">
                                        <label class="form-label">Nama Petugas</label>
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
                                    <label class="form-label">Level</label>
                                    <div class="row clearfix">
                                        <div class="col-sm-12">
                                            <select class="form-control show-tick" name="id_level">
                                                <option value="">-- Pilih Level --</option>
                                                <option value="1">Administrator</option>
                                                <option value="2">Operator</option>
                                            </select>
                                        </div>
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
@foreach($petugas as $row)
<div class="modal fade" id="defaultModalEditPetugas{{$row->id_petugas}}" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Update Petugas</h4>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="{{'petugas/update/'.$row->id_petugas}}">
                                @csrf @method('patch')
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="nama_petugas" class="form-control" value="{{$row->nama_petugas}}">
                                        <label class="form-label">Nama Petugas</label>
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
                                    <label class="form-label">Level</label>
                                    <div class="row clearfix">
                                        <div class="col-sm-12">
                                            <select class="form-control show-tick" name="id_level">
                                                <option value="">-- Pilih Level --</option>
                                                @foreach($level as $list)
                                                @if($row->id_level == $list->id_level)
                                                <option value="{{$list->id_level}}" selected>{{$list->nama_level}}</option>
                                                @else
                                                <option value="{{$list->id_level}}">{{$list->nama_level}}</option>
                                                @endif
                                                @endforeach   
                                            </select>
                                        </div>
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
