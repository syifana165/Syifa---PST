<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Form Laporan Petugas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0; padding: 0;
            background: url('{{ asset('assets/img/hh.jpg') }}') no-repeat center center fixed;
            background-size: cover;
        }
        .container {
            width: 90vw;
            max-width: 600px;
            padding: 20px;
            background: rgba(255,255,255,0.95);
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            margin: 50px auto 80px;
        }
        h2 {
            text-align: center;
            color: #222;
            margin-bottom: 25px;
        }
        form {
            display: flex;
            flex-direction: column;
            width: 100%;
        }
        label {
            font-weight: 600;
            margin-top: 15px;
            color: #222;
        }
        input, textarea, select {
            width: 100%;
            padding: 10px 12px;
            margin-top: 6px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 15px;
            background-color: white;
            color: #222;
            font-family: Arial, sans-serif;
            transition: border-color 0.3s;
        }
        input:focus, textarea:focus, select:focus {
            border-color: #007bff;
            outline: none;
        }
        textarea {
            resize: vertical;
            min-height: 80px;
        }
        .button-container {
            display: flex;
            justify-content: space-between;
            margin-top: 25px;
        }
        .btn-submit {
            background-color: #28a745;
            color: white;
            padding: 12px 22px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s;
            flex: 1;
            margin-right: 10px;
            text-align: center;
        }
        .btn-submit:hover {
            background-color: #218838;
        }
        .btn-back {
            background-color: #ff7043;
            color: white;
            padding: 12px 22px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s;
            text-align: center;
            text-decoration: none;
            flex: 1;
            margin-left: 10px;
            line-height: 1;
            display: inline-block;
            user-select: none;
        }
        .btn-back:hover {
            background-color: #d84315;
            text-decoration: none;
            color: white;
        }
        .alert {
            padding: 12px 20px;
            margin-bottom: 15px;
            border-radius: 6px;
            font-weight: 600;
        }
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .alert-error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .alert ul {
            margin: 0;
            padding-left: 20px;
        }
        @media (max-width: 480px) {
            .button-container {
                flex-direction: column;
            }
            .btn-submit, .btn-back {
                margin: 5px 0;
                flex: unset;
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Form Laporan Petugas</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-error">
                <ul>
                    @foreach($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('laporan.store') }}" method="POST" enctype="multipart/form-data" novalidate>
            @csrf

            <label for="id_petugas">Pilih Petugas:</label>
            <select name="id_petugas" id="id_petugas" onchange="isiDataPetugas()" required>
                <option value="">-- Pilih Petugas --</option>
                @foreach($petugas as $p)
                    <option 
                        value="{{ $p->id_petugas }}" 
                        data-nama="{{ $p->Nama }}" 
                        data-no_hp="{{ $p->No_HP }}"
                        {{ old('id_petugas') == $p->id_petugas ? 'selected' : '' }}
                    >
                        {{ $p->Nama }} - {{ $p->No_HP }}
                    </option>
                @endforeach
            </select>

            <label for="nama">Nama:</label>
            <input type="text" id="nama" readonly value="{{ old('nama') }}">

            <label for="no_hp">No HP:</label>
            <input type="text" id="no_hp" readonly value="{{ old('no_hp') }}">

            <label for="tanggal">Tanggal:</label>
            <input type="date" name="tanggal" id="tanggal" required value="{{ old('tanggal') }}">

            <label for="lokasi_tugas">Lokasi Tugas:</label>
            <input type="text" name="lokasi_tugas" id="lokasi_tugas" placeholder="Masukkan lokasi tugas" required value="{{ old('lokasi_tugas') }}">

            <label for="deskripsi_tugas">Deskripsi Tugas:</label>
            <textarea name="deskripsi_tugas" id="deskripsi_tugas" rows="4" placeholder="Deskripsikan tugas" required>{{ old('deskripsi_tugas') }}</textarea>

            <label for="upload_foto">Upload Bukti Foto:</label>
            <input type="file" name="upload_foto" id="upload_foto" accept="image/*" required>

            <div class="button-container">
                <button type="submit" class="btn-submit">Kirim Laporan</button>
                <a href="{{ route('laporan.index') }}" class="btn-back">⬅️ Kembali</a>
            </div>
        </form>
    </div>

    <script>
        function isiDataPetugas() {
            const select = document.getElementById('id_petugas');
            const selected = select.options[select.selectedIndex];

            document.getElementById('nama').value = selected.getAttribute('data-nama') || '';
            document.getElementById('no_hp').value = selected.getAttribute('data-no_hp') || '';
        }

        // Jika ada old input petugas, isi otomatis saat reload
        window.addEventListener('DOMContentLoaded', () => {
            const select = document.getElementById('id_petugas');
            if(select.value) {
                isiDataPetugas();
            }
        });
    </script>
</body>
</html>
