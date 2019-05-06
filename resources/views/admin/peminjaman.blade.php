@extends('layouts.layoutAdmin');
@section('content');
        <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Daftar Peminjam</h2>
                            <button type="submit" class="btn btn-primary right" data-target="#modalPeminjaman" data-toggle="modal">Tambah</button>
                        </div>
                        <div class="body">
                            <form method="post">
                            @csrf @method('patch')
                            <div class="table-responsive">
                                <table class="table table-hover dashboard-task-infos">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pegawai</th>
                                            <th>Nama Barang</th>
                                            <th>Tanggal Pinjam</th>
                                            <th>Tanggal Kembali</th>
                                            <th>Status Peminjaman</th>
                                            {{-- <th>Aksi</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($peminjaman as $row)
                                        <tr>
                                            <td>{{$loop->index+1}}</td>
                                            <td>
                                                @foreach($pegawai as $a)
                                                @if($row->id_pegawai == $a->id_pegawai)
                                                {{$a->nama_pegawai}}
                                                @endif
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach(DB::table('detail_pinjams')->where('id_peminjaman',$row->id_peminjaman)->get() as $e)
                                                <span class="badge badge-primary">
                                                {{DB::table('inventaris')->where('id_inventaris',$e->id_inventaris)->first()->nama}}
                                                </span>
                                                @endforeach
                                            </td>
                                            <td>{{$row->tanggal_pinjam}}</td>
                                            <td>{{$row->tanggal_kembali}}</td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <button id="btnGroupVerticalDrop1" type="button" class="btn bg-teal waves-effect dropdown-toggle" data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false">
                                                        {{$row->status_peminjaman}} <span class="caret"></span>
                                                    </button>
                                                    @if($row->status_peminjaman == "menunggu")
                                                    <ul class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">
                                                        <li><a href="{{url('updacc/'.$row->id_peminjaman)}}">Acc</a></li>
                                                    </ul>
                                                    @elseif($row->status_peminjaman == "sedang")
                                                    <ul class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">
                                                        <li><a href="{{url('updstatus/'.$row->id_peminjaman)}}">Sudah</a></li>
                                                    </ul>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" id="modalPeminjaman" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Peminjaman</h4>
                        </div>
                            <form action="{{url('peminjaman/proses')}}" method="post">
                            @csrf
                        <div class="modal-body">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <label class="form-label">Pegawai</label>
                                        <select name="id_pegawai" class="form-control">
                                            <option value="">-- Pegawai --</option>
                                            @foreach($pegawai as $peminjam)
                                                <option value="{{$peminjam->id_pegawai}}">{{$peminjam->nama_pegawai}}</option>
                                            @endforeach
                                        </select>                                        
                                    </div>
                                </div>
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
                                                <input type="date" class="form-control date" placeholder="Ex: 30/07/2016" name="tanggal_pinjam" value="{{date('Y-m-d')}}" readonly="">
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
                        </div>
                        <div class="modal-footer">
                                <button type="submit" class="btn btn-primary waves-effect">Simpan</button>
                                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Keluar</button>
                        </div>
                            </form>
                    </div>
                </div>
</div>
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