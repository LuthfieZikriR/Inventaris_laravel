<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Laporan Barang Rusak</title>
	<button type="submit" onclick="window.print()" class="print">Print</button>
	<center><h1>Laporan Barang Rusak</h1></center>
</head>
<style type="text/css">
	@media print{
		.print{
			display: none;
		}
	}
</style>
<body>	
	<center>
		<table border="1" cellspacing="0" cellpadding="1" width="50%">
			<thead>
				<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Jumlah</th>
				</tr>
			</thead>
			<tbody>
				@foreach($laporan_rusak as $row)
				<tr>
					<td>{{$loop->index+1}}</td>
					<td>{{$row->nama}}</td>
					<td>{{$row->stok}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</center>
</body>
</html>