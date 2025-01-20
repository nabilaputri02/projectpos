<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Absensi Pegawai</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(120deg,rgb(255, 255, 255),rgb(228, 237, 253));
            margin: 0;
            padding: 0;
        }

        .container {
            width: 90%;
            max-width: 550px;
            margin: 70px auto;
            padding: 30px;
            background: #ffffff;
            border-radius: 15px;
            box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .container:hover {
            transform: translateY(-5px);
            box-shadow: 0px 12px 25px rgba(0, 0, 0, 0.2);
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #555;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            height: 45px;
            padding: 10px;
            border-radius: 8px;
            border: 1px solid #ddd;
            box-sizing: border-box;
            font-size: 14px;
            transition: border 0.3s ease;
        }

        .form-group input:focus,
        .form-group select:focus {
            border-color: #66a6ff;
            outline: none;
        }

        button[type="submit"] {
            width: 100%;
            height: 50px;
            background: linear-gradient(120deg, #66a6ff, #89f7fe);
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        button[type="submit"]:hover {
            background: linear-gradient(120deg, #89f7fe, #66a6ff);
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
        }

        .btn-back {
            display: inline-block;
            margin-bottom: 25px;
            text-decoration: none;
            color: #fff;
            background-color: #4a4a4a;
            padding: 10px 20px;
            border-radius: 8px;
            font-size: 14px;
            text-align: center;
            transition: background-color 0.3s ease;
        }

        .btn-back:hover {
            background-color: #333;
        }

        .form-group input::placeholder {
            font-size: 12px;
            color: #aaa;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="/" class="btn-back">&larr; Kembali</a>
        <h1>Data Absensi Pegawai</h1>
        <form action="{{ route('absensi.store') }}" method="POST" id="form-absensi-data">
            @csrf <!-- Token CSRF wajib untuk keamanan -->

            <div class="form-group">
                <label for="nama">Nama Pegawai:</label>
                <input type="text" id="nama" name="nama" placeholder="Masukkan nama pegawai" required>
            </div>

            <div class="form-group">
                <label for="statuskehadiran">Status Kehadiran:</label>
                <select id="statuskehadiran" name="statuskehadiran" required>
                    <option value="">Pilih Status Kehadiran</option>
                    <option value="hadir">Hadir</option>
                    <option value="sakit">Sakit</option>
                    <option value="izin">Izin</option>
                    <option value="absen">Absen</option>
                </select>
            </div>

            <div class="form-group">
                <label for="keterangan">Keterangan:</label>
                <input type="text" id="keterangan" name="keterangan" placeholder="Tulis keterangan (opsional)">
            </div>

            <button type="submit">Simpan Absensi</button>
        </form>

        @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Toastify({
                    text: "{{ session('success') }}",
                    duration: 3000,
                    gravity: "top",
                    position: "right",
                    backgroundColor: "#4CAF50",
                    stopOnFocus: true,
                }).showToast();
            });
        </script>
        @endif

        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    </div>
</body>
</html>
