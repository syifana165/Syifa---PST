<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pengaduan</title>
    <link rel="stylesheet" href="{{ asset('css/halaman.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: url('/assets/img/hh.jpg') no-repeat center center fixed;
            background-size: cover;
        }

        .container {
            width: 80vw;
            max-width: 600px;
            height: auto;
            padding: 20px;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            margin: 50px auto;
        }

        h2 {
            text-align: center;
            color: black;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            width: 100%;
        }

        label {
            font-weight: 600;
            margin-top: 10px;
            color: black;
        }

        input, textarea {
            width: calc(100% - 20px);
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            background-color: white;
            color: black;
        }

        .btn-upload {
            font-size: 14px;
            padding: 8px;
            cursor: pointer;
            background-color: #00796b;
            color: white;
            border: none;
            border-radius: 5px;
        }

        .btn-upload:hover {
            background-color: #004d40;
        }

        .button-container {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .btn-submit {
            background-color: #28a745;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
            text-align: center;
        }

        .btn-submit:hover {
            background-color: #218838;
        }

        .btn-back {
            background-color: #ff7043;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
            text-align: center;
        }

        .btn-back:hover {
            background-color: #d84315;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Form Pengaduan</h2>
        <form action="{{ route('pengaduan.store') }}" method="POST" enctype="multipart/form-data">
         @csrf
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="Nama" required>

            <label for="alamat">Alamat:</label>
            <div style="display: flex; gap: 10px;">
                <input type="text" id="alamat" name="Alamat" required style="flex: 1;">
                <button type="button" id="detectLocation" class="btn-upload">📍 Autodetect</button>
            </div>
            <small id="location-status" style="color: gray;"></small>

            <label for="no_hp">No HP:</label>
            <input type="tel" id="no_hp" name="No_HP" required>

            <label for="Tanggal">Tanggal:</label>
            <input type="date" id="Tanggal" name="Tanggal" required>

            <label for="pengaduan">Pengaduan:</label>
            <textarea id="pengaduan" name="Pengaduan" required></textarea>

            <label>Upload Bukti:</label>
            <input type="file" name="Foto_Pengaduan" required>

            <div class="button-container">
                <button type="submit" class="btn-submit">🚀 Kirim Pengaduan</button>
                <button type="button" class="btn-back" onclick="window.location.href='{{ route('v_halaman') }}'">⬅️ Kembali</button>
            </div>
        </form>
    </div>

    <script>
        document.getElementById("detectLocation").addEventListener("click", function() {
            let statusText = document.getElementById("location-status");
            statusText.innerText = "🔄 Mendeteksi lokasi...";
            
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    let latitude = position.coords.latitude;
                    let longitude = position.coords.longitude;

                    fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${latitude}&lon=${longitude}`)
                        .then(response => response.json())
                        .then(data => {
                            let address = data.address;
                            let lokasi = address.village || address.town || address.city || "Lokasi tidak ditemukan";
                            document.getElementById("alamat").value = lokasi;
                            statusText.innerText = "✅ Lokasi berhasil dideteksi!";
                        })
                        .catch(error => {
                            statusText.innerText = "❌ Gagal mendapatkan alamat.";
                        });
                }, function(error) {
                    statusText.innerText = "❌ Izin lokasi ditolak.";
                });
            } else {
                statusText.innerText = "❌ Browser tidak mendukung geolokasi.";
            }
        });
    </script>
</body>
</html>
