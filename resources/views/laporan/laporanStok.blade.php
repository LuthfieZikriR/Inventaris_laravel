<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LAPORAN STOK BARANG</title>
    <button type="submit" onclick="window.print()" class="print">Print</button>
    <center><H1>LAPORAN STOK BARANG</H1></center>
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
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Stok</th>
                    <th>Jumlah Barang</th>
                </tr>
            </thead>
            <tbody>
                @foreach($inventaris as $row)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$row->kode_inventaris}}</td>
                    <td>{{$row->nama}}</td>
                    <td>{{$row->stok}}</td>
                    <td>{{$row->jumlah}}</td>
                </tr>
                @endforeach
            </tbody>
    </table>
    </center>
</body>
</html>
