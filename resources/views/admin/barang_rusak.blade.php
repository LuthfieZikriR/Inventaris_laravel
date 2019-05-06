@extends('layouts.layoutAdmin')

<section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>List Barang Rusak</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive" style="margin-top: 30px;">
                                <table class="table table-responsive table-hover ">
                                    <thead>
                                        <th>#</th>
                                        <th>Nama Barang</th>
                                        <th>Jumlah Rusak</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                        @foreach($list as $key)
                                        <tr>
                                            
                                        <td>{{$loop->index + 1}}</td>
                                        <td>{{$key->nama}}</td>
                                        <td> {{$key->stok}} </td>
                                        <td> <a class="btn btn-primary" href="{{url('peminjaman/done_rusak/'.$key->id_rusak)}}">Selesai</a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
