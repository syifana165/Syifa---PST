@extends('layout.v_public')

@section('title', 'Data Petugas')

@section('content')
<style>
    body {
        background-color: #f1f3f5;
        font-family: 'Segoe UI', sans-serif;
        margin: 0;
    }

    .container {
        margin: 0;
        padding: 10px 30px 30px 30px;
    }

    h2 {
        font-size: 22px;
        margin-top: 5px;
        margin-bottom: 20px;
        color: #343a40;
    }

    .search-container {
        margin-bottom: 20px;
    }

    #searchInput {
        padding: 8px 15px;
        font-size: 14px;
        border: 1px solid #ccc;
        border-radius: 6px;
        width: 100%;
        max-width: 300px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background-color: #fff;
        margin-top: 10px;
    }

    thead {
        background-color: #4caf50;
        color: white;
    }

    th, td {
        padding: 12px 16px;
        text-align: left;
        border-bottom: 1px solid #dee2e6;
    }

    tr:hover {
        background-color: #f8f9fa;
    }

    .badge-status {
        padding: 5px 12px;
        border-radius: 20px;
        background-color: #28a745;
        color: white;
        font-size: 13px;
    }

    .no-data {
        text-align: left;
        padding: 15px;
        color: #888;
        font-style: italic;
    }

    .btn-back {
        margin-top: 20px;
        display: inline-block;
        padding: 10px 20px;
        background-color: #6c757d;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
        font-size: 14px;
    }

    .btn-back:hover {
        background-color: #5a6268;
    }
</style>

<div class="container">
    <h2>Data Petugas</h2>

    <div class="search-container">
        <input 
            type="text" 
            id="searchInput" 
            placeholder="Cari Nama, Alamat, atau Keterangan..." 
            onkeyup="filterTable()" 
        />
    </div>

    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>No HP</th>
                <th>Alamat</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody id="dataTable">
            @forelse($dataPetugas as $petugas)
                <tr>
                    <td>{{ $petugas->Nama }}</td>
                    <td>{{ $petugas->No_HP }}</td>
                    <td>{{ $petugas->Alamat }}</td>
                    <td>{{ $petugas->tim->Kelompok_Petugas ?? '-' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="no-data">Data petugas belum tersedia.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <a href="{{ route('v_halaman') }}" class="btn-back">← Kembali ke Beranda</a>
</div>

<script>
    function filterTable() {
        const input = document.getElementById('searchInput').value.toLowerCase();
        const rows = document.querySelectorAll('#dataTable tr');

        rows.forEach(row => {
            const nama = row.cells[0]?.innerText.toLowerCase() || '';
            const nohp = row.cells[1]?.innerText.toLowerCase() || '';
            const alamat = row.cells[2]?.innerText.toLowerCase() || '';

            const cocok = nama.includes(input) || nohp.includes(input) || alamat.includes(input);

            row.style.display = cocok ? '' : 'none';
        });
    }
</script>


@endsection
