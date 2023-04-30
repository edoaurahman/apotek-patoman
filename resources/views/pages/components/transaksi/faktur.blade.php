<!DOCTYPE html>
<html>

<head>
    <title>Faktur Pembelian Apotek</title>
    <style type="text/css">
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            line-height: 1.5;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 500px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .info {
            margin-bottom: 10px;
        }

        .info span {
            font-weight: bold;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .table th,
        .table td {
            padding: 5px;
            border: 1px solid #ccc;
            text-align: center;
        }

        .table th {
            background-color: #eee;
            font-weight: bold;
        }

        .total {
            font-weight: bold;
            font-size: 16px;
            text-align: right;
        }

        .footer {
            text-align: center;
            font-size: 10px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="title">FAKTUR PEMBELIAN APOTEK</div>
            <div class="info">
                <span>No. Faktur:</span> {{$transaksi->id}}<br>
                <span>Tanggal:</span> {{$transaksi->tgl}}
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Nama Obat</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($detail_transaksi as $item)
                    <tr>
                        <td>{{ $item->nama_obat }}</td>
                        <td>{{ $item->jumlah }}</td>
                        <td>{{ $item->harga }}</td>
                        <td>{{ $item->jumlah * $item->harga }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="3" class="total">Total</td>
                    <td>{{$transaksi->total_pembayaran}}</td>
                </tr>
            </tbody>
        </table>
        <div class="footer">
            Apotek Patoman , Jl. Raya Sudirman No. 123, Jakarta
        </div>
        <a href="{{route('transaksi')}}">Kembali</a>
    </div>
</body>

</html>
