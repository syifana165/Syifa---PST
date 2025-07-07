@extends('layout.v_public')

@section('title', 'Data Pengaduan')

@section('content')
<style>
    body {
        background-color: #f1f3f5;
        font-family: 'Segoe UI', sans-serif;
        margin: 0;
    }

    .container {
        padding: 10px 30px 30px 30px;
    }

    h2 {
        font-size: 22px;
        margin-top: 5px;
        margin-bottom: 20px;
        color: #343a40;
    }

    .search-container {
        margin-bottom: 15px;
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
        background-color: #343a40;
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

    img.foto-pengaduan {
        width: 100px;
        height: auto;
        border-radius: 4px;
    }

    .badge-status {
        padding: 4px 10px;
        border-radius: 3px;
        background-color: #6c757d;
        color: white;
        font-size: 13px;
        display: inline-block;
        font-weight: 500;
        white-space: nowrap;
    }

    .bg-warning { background-color: #ffc107 !important; color: #212529; }
    .bg-primary { background-color: #007bff !important; }
    .bg-success { background-color: #28a745 !important; }

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

    .no-data {
        text-align: left;
        padding: 15px;
        color: #888;
        font-style: italic;
    }
</style>

<div class="container">
    <h2>Data Pengaduan</h2>

    <div class="search-container">
        <input 
            type="text" 
            id="searchInput" 
            placeholder="Cari Nama, Alamat, No HP, atau Pengaduan..." 
            onkeyup="filterPengaduan()"
        />
    </div>

    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Tanggal</th>
                <th>No HP</th>
                <th>Pengaduan</th>
                <th>Foto</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody id="pengaduanTable">
            @forelse($data_pengaduan as $pengaduan)
                <tr>
                    <td>{{ $pengaduan->Nama }}</td>
                    <td>{{ $pengaduan->Alamat }}</td>
                    <td>{{ $pengaduan->Tanggal }}</td>
                    <td>{{ $pengaduan->No_HP }}</td>
                    <td>{{ $pengaduan->Pengaduan }}</td>
                    <td>
                        @if($pengaduan->Foto_Pengaduan)
                            <img src="{{ asset('foto_pengaduan/'.$pengaduan->Foto_Pengaduan) }}" alt="Foto" class="foto-pengaduan">
                        @else
                            <em>Tidak ada foto</em>
                        @endif
                    </td>
                    <td>
                        @php
                            $status = strtolower($pengaduan->status);
                            $badgeClass = match($status) {
                                'pengaduan' => 'bg-warning',
                                'sedang diproses' => 'bg-primary',
                                'selesai' => 'bg-success',
                                default => '',
                            };
                        @endphp
                        <span class="badge-status {{ $badgeClass }}">{{ strtoupper($pengaduan->status) }}</span>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="no-data">Data pengaduan belum tersedia.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <a href="{{ route('v_halaman') }}" class="btn-back">← Kembali ke Beranda</a>
</div>

<script>
    function filterPengaduan() {
        const input = document.getElementById('searchInput').value.toLowerCase();
        const rows = document.querySelectorAll('#pengaduanTable tr');

        rows.forEach(row => {
            const nama     = row.cells[0]?.innerText.toLowerCase() || '';
            const alamat   = row.cells[1]?.innerText.toLowerCase() || '';
            const tanggal  = row.cells[2]?.innerText.toLowerCase() || '';
            const nohp     = row.cells[3]?.innerText.toLowerCase() || '';
            const isi      = row.cells[4]?.innerText.toLowerCase() || '';

            const cocok = nama.includes(input) || alamat.includes(input) || tanggal.includes(input) || nohp.includes(input) || isi.includes(input);
            row.style.display = cocok ? '' : 'none';
        });
    }
</script>
@endsection
