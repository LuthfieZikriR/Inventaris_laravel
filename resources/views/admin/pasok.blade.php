@extends('layouts.layoutAdmin');
@section('content');
        <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Tambah Pasok</h2>
                        </div>
                        <div class="body">
                            <form method="post" action="{{url('pasok/tambah/'.$inventaris->id_inventaris)}}">
                                @csrf
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
                                        <input type="number" name="jumlah" class="form-control" value="">
                                        <label class="form-label">Jumlah</label>
                                    </div>
                                </div>
                                 <button type="submit" class="btn btn-primary">Tambah</button>
                                </div>
                                <br>  
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
