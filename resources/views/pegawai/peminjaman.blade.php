@extends('layouts.layoutPegawai');
@section('content');
        <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Daftar Peminjam</h2>
                        </div>
                        <form method="post" action="{{url('peminjaman/proses')}}">
                            @csrf
                        <div class="body">
                                <div class="row clearfix">
                                    <div class="col-md-5">
                                        <div class="form-group form-float">
                                                <div class="form-line">
                                                <label class="form-label">Inventaris</label>
                                                <select name="id_inventaris[]" class="form-control">
                                                    <option value="">-- Pilih Barang --</option>
                                                    @foreach($inventaris as $barang)
                                                        <option value="{{$barang->id_inventaris}}">{{$barang->nama}}</option>
                                                    @endforeach
                                                </select>                                        
                                                </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                            <label class="form-label">Jumlah</label>
                                            <input type="number" name="stok[]" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div id="container">
                                        
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group form-float">
                                            <button onclick="add()" type="button" class="btn btn-primary waves-effect">
                                            <i class="material-icons">add</i>
                                            </button>
                                        </div>
                                        <div class="form-group form-float">
                                            <button onclick="min()" type="button" class="btn btn-primary waves-effect">
                                            <i class="material-icons">close</i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                     <label class="form-label">Tanggal Pinjam</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">date_range</i>
                                            </span>
                                            <div class="form-line">
                                                <input type="date" class="form-control date" placeholder="Ex: 30/07/2016" name="tanggal_pinjam">
                                            </div>
                                        </div>
                                </div>
                                <div class="form-group form-float">
                                    <label class="form-label">Tanggal Kembali</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">date_range</i>
                                            </span>
                                            <div class="form-line">
                                                <input type="date" class="form-control date" placeholder="Ex: 30/07/2016" name="tanggal_kembali">
                                            </div>
                                        </div>    
                                </div>
                                <button type="submit" class="btn btn-primary">Pinjam</button>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
    <script>
    function add(){
        $no = 0;
        $(".qty").each(function(){
            $no++;
        });
        $("#container").append("<div id='item_"+$no+"' class='col-md-5'> <div class='form-group form-float'> <div class='form-line'> <select name='id_inventaris[]' class='form-control'> <option value=''>-- Pilih Barang --</option> @foreach($inventaris as $barang) <option value='{{$barang->id_inventaris}}'>{{$barang->nama}}</option> @endforeach </select> </div> </div> </div> <div id='qty_"+$no+"' class='col-md-5 qty'> <div class='form-group form-float'> <div class='form-line'> <label class='form-label'>Jumlah</label> <input type='number' name='jumlah[]' class='form-control'> </div> </div> </div>");
    }

    function min(){
        $no = -1;
        $(".qty").each(function(){
            $no++;
        });
        $("#item_"+$no.toString()).remove();
        $("#qty_"+$no.toString()).remove();
    }
</script>