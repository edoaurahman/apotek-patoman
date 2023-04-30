<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Bulanan</title>
    <style>
        table {
            width: 95%;
            border-collapse: collapse;
            margin: 50px auto;
        }

        tr:nth-of-type(odd) {
            background: #eee;
        }

        th {
            background: #3498db;
            color: white;
            font-weight: bold;
        }

        td,
        th {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
            font-size: 18px;
        }
    </style>
</head>

<body>
    <div style="width: 95%; margin: 0 auto 100px auto;">
        <div style="float: left;">
            <h1>Laporan Bulanan :</h1>
        </div>
        <div style="float: right;">
            <h1>{{ $data['tanggal'] }}</h1>
        </div>
    </div>
    <table>
        <thead>
            <tr>
                <th>Nama Obat</th>
                <th>Terjual</th>
                <th>Harga</th>
                <th>Sub Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data['obat'] as $item)
                <tr>
                    <td>{{ $item->nama_obat }}</td>
                    <td>{{ $item->total_obat }}</td>
                    <td>Rp. {{ number_format($item->harga, 2, ',', '.') }}</td>
                    <td>Rp. {{ number_format($item->sub_total, 2, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div style="width: 95%; margin: 0px auto;">
        <div style="float: left;">
            <h3>Total Transaksi Bulan ini : </h3>
        </div>
        <div style="float: right; margin-right: 60px;">
            <h3>Rp. {{ number_format($data['total_transaksi'], 2, ',', '.') }}</h3>
        </div>
    </div>
</body>

</html>
