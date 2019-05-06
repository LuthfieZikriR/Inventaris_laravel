@extends('layouts.layoutOperator')
<section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Selesai Peminjaman</h2>
                        </div>
                        <div class="body">
                            Peminjam : {{DB::table('pegawais')->where('id_pegawai',$peminjaman->id_pegawai)->first()->nama_pegawai}}
                            <br>
                            Tanggal Pinjam : {{$peminjaman->tanggal_pinjam}}
                            <br>
                            <div class="table-responsive" style="margin-top: 30px;">
                                <form method="post"action="{{url('operator/peminjamanOperator/done/'.$peminjaman->id_peminjaman)}}">
                                @csrf
                                <table class="table table-responsive table-hover ">
                                    <thead>
                                        <th>#</th>
                                        <th>Nama Barang</th>
                                        <th>Jumlah Pinjam</th>
                                        <th>Jumlah Rusak</th>
                                    </thead>
                                    <tbody>
                                        @foreach($barang as $key)
                                        <tr>
                                            
                                        <td>{{$loop->index + 1}}</td>
                                        <td>{{$key->nama}}</td>
                                        <td> {{$key->stok}} </td>
                                        <td> <input type="number" value="0" max="{{$key->stok}}" required="" name="rusak[]" class="form-control"> </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <button class="btn btn-primary btn-lg">Selesai</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>


