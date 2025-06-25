<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pendapatan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 20px;
        }
        h3, h4 {
            text-align: center;
            margin: 5px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            padding: 6px;
            border: 1px solid #ddd;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        .table-striped tbody tr:nth-child(odd) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>

    <h3>Laporan Pendapatan</h3>
    <h4>
        Tanggal {{ date('d-m-Y', strtotime($awal)) }} s/d {{ date('d-m-Y', strtotime($akhir)) }}
    </h4>

    <table class="table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Penjualan</th>
                <th>Pembelian</th>
                <th>Pengeluaran</th>
                <th>Pendapatan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $index => $row)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $row['tanggal'] }}</td>
                    <td>{{ $row['penjualan'] }}</td>
                    <td>{{ $row['pembelian'] }}</td>
                    <td>{{ $row['pengeluaran'] }}</td>
                    <td>{{ $row['pendapatan'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
