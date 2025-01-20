<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Absensi Pegawai</title>
    <style>
        /* Styling untuk PDF */
        body {
            font-family: Arial, sans-serif;
        }
        h2 {
            text-align: center;
        }
        table {
            width: 100%;
            border: 1px solid black;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            border: 1px solid #000;
        }
    </style>
</head>
<body>
    <h2>Laporan Absensi Pegawai</h2>
    <table>
        <tr>
            <th>Nama Pegawai</th>
            <td>{{ $data->nama }}</td>
        </tr>
        <tr>
            <th>Tanggal Hadir</th>
            <td>{{ \Carbon\Carbon::parse($data->created_at)->translatedFormat('l, d F Y') }}</td>
        </tr>
        <tr>
            <th>Status Kehadiran</th>
            <td>{{ $data->statuskehadiran }}</td>
        </tr>
        <tr>
            <th>Keterangan</th>
            <td>{{ $data->keterangan }}</td>
        </tr>
    </table>
    <p>Dicetak pada: {{ now()->format('d-m-Y H:i:s') }}</p>
</body>
</html>
