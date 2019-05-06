<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DAFTAR PEMINJAMAN</title>
    <button type="submit" onclick="window.print()" class="print">Print</button>
    <center><H1>DAFTAR PEMINJAMAN</H1></center>
</head>
<style type="text/css">
    @media print{
        .print{
            display: none;
        }
    }
</style>
<body>
    <center><table border="1" cellpadding="1" cellspacing="0" width="50%">
        <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Nama Barang</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Jumlah</th>
        </tr>
        </thead>
        <tbody>
        @foreach($lap_peminjaman as $row)
        <tr>
            <td>{{$loop->index+1}}</td>
            <td>{{$row->nama_pegawai}}</td>
            <td>{{$row->nama}}</td>
            <td>{{$row->tanggal_pinjam}}</td>
            <td>{{$row->tanggal_kembali}}</td>
            <td>{{$row->stok}}</td>
        </tr>
        @endforeach
        </tbody>
    </table></center>
</body>
</html>
                            
    
