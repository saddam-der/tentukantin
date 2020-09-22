<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .table1 {
            margin-left: 135px;
            margin-bottom: 10px;
        }
        .table1 th {
            text-align: left;
        }
        .table2, h1 {
            font-family: sans-serif;
            text-align: center;
            margin: auto;
        }
    </style>
</head>
<body>
    @if (!empty($pesanan))
    <h1>STRUK PEMBAYARAN</h1> <br><br><br>
    <table class="table1">
        <tr>
            <th>Nama</th>
            <td>:</td>
            
        </tr>
        <tr>
            <th>Tanggal Pesan</th>
            <td>:</td>
            <td>{{ $pesanan->tanggal_pesan }}</td>
        </tr>
    </table>

    <table class="table2" border="1" cellspacing="0" cellpadding="10" >
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Masakan</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Total Harga</th>
            </tr>
        </thead>
        <tbody>
            <tbody>
                <?php $no = 1; ?>
                @foreach($pesanan_details as $pesanan_detail)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$pesanan_detail->masakan->nama_masakan}}</td>
                    <td class="text-center">{{$pesanan_detail->jumlah}}</td>
                    <td class="text-center">Rp. {{ number_format($pesanan_detail->masakan->harga)}}</td>
                    <td class="text-center">Rp. {{ number_format($pesanan_detail->jumlah_harga)}}</td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="4" class="text-right"> <strong> Total Harga : </strong></td>
                    <td class="text-center">Rp. {{ number_format($pesanan->jumlah_harga) }} </td>
                </tr>
                <tr>
                    <td colspan="4" class="text-right"> <strong> Total Bayar : </strong></td>
                    <td class="text-center">Rp. {{ number_format($pesanan->total_bayar) }} </td>
                </tr>
            </tbody>
        </tbody>
    </table>
    @endif
</body>
</html>