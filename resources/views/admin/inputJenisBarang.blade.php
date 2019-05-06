@extends('layouts.layoutAdmin');
@section('content');

<section class="content">
	<div class="container-fluid">
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					<div class="header">
						<h2>Daftar Jenis Barang</h2>
						<button type="submit" class="btn btn-primary right" data-target="#defaultModal" data-toggle="modal">Tambah</button>
					</div>
					<div class="body table-responsive">
						<table class="table">
							<thead>
								<th>Kode Jenis</th>
								<th>Nama Jenis</th>
								<th>Keterangan</th>
								<th>Aksi</th>
							</thead>
							<tbody>
								@foreach($jenisBarang as $row)
								<tr>
								<td>{{$row->kode_jenis}}</td>
								<td>{{$row->nama_jenis}}</td>
								<td>{{$row->keterangan}}</td>
								<td>
									<a href="#" type="button" class="btn btn-primary" data-toggle="modal" data-target="#defaultModalEdit{{$row->id_jenis}}">Edit</a>
                                    <a href="{{'jenis_barang/hapus/'.$row->id_jenis}}" class="btn btn-danger">Hapus</a>
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
<div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="defaultModalLabel">Tambah Jenis Barang</h4>
			</div>
			<div class="modal-body">
				<form method="post" action="{{'jenis_barang/simpan'}}">
					@csrf
					<div class="form-group form left">
						<div class="form-line">
							<input type="text" name="kode_jenis" class="form-control" required="" readonly="" value="{{$kode}}">
							<label class="form-label">Kode Jenis</label>
						</div>
						<div class="form-line">
							<input type="text" name="nama_jenis" class="form-control" required="">
							<label class="form-label">Nama Jenis</label>
						</div>
						<div class="form-line">
							<input type="text" name="keterangan" class="form-control" required="">
							<label class="form-label">Keterangan</label>
						</div>
					</div>
					<br>
					<div class="modal-footer">
						<button type="submit" class="btn btn-success waves-effect">Simpan</button>
						<button type="submit" class="btn btn-danger waves-effect">Batal</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@foreach($jenisBarang as $row)
<div class="modal fade" id="defaultModalEdit{{$row->id_jenis}}" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="defaultModalLabel">Update Jenis Barang</h4>
			</div>
			<div class="modal-body">
				<form method="post" action="{{'jenis_barang/update/'.$row->id_jenis}}">
					@csrf @method('patch')
					<div class="form-group form-float">
						<div class="form-line">
							<input type="text" name="kode_jenis" class="form-control" readonly="" value="{{$row->kode_jenis}}">
							<label class="form-label">Kode Jenis</label>
						</div>
					</div>
					<div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" name="nama_jenis" class="form-control" value="{{$row->nama_jenis}}">
                            <label class="form-label">Nama Jenis</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" name="keterangan" class="form-control" value="{{$row->keterangan}}">
                            <label class="form-label">Keterangan</label>
                        </div>
                    </div>
                    <br>
                    <div class="modal-footer">
                    	<button type="submit" class="btn btn-primary waves-effect">Update</button>
                    	<button type="submit" class="btn btn-danger waves-effect" data-dismiss="modal">Back</button>
                    </div>
				</form>
			</div>
		</div>
	</div>
</div>
@endforeach
@endsection