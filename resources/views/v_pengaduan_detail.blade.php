@extends('layout.v_template')

@section('title', 'Detail Pengaduan')

@section('content')
<style>
    /* Font Google Fonts - Montserrat & Open Sans */
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@600&family=Open+Sans&display=swap');

    body {
        font-family: 'Open Sans', sans-serif;
        background: #f9fafb;
        color: #444;
    }

    .detail-card {
        max-width: 900px;
        margin: 3rem auto;
        background: #fff;
        border-radius: 15px;
        box-shadow: 0 15px 35px rgba(50,50,93,.1), 0 5px 15px rgba(0,0,0,.07);
        overflow: hidden;
        display: flex;
        transition: transform 0.3s ease;
    }
    .detail-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 25px 45px rgba(50,50,93,.15), 0 10px 20px rgba(0,0,0,.1);
    }

    .detail-image {
        flex: 1;
        background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 2rem;
    }
    .detail-image img {
        max-width: 100%;
        border-radius: 12px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.12);
        object-fit: cover;
    }
    .no-image {
        font-style: italic;
        color: #bbb;
        font-size: 1.1rem;
    }

    .detail-content {
        flex: 1.3;
        padding: 2.5rem 3rem;
        font-family: 'Montserrat', sans-serif;
        color: #2c3e50;
    }
    .detail-content h3 {
        font-weight: 700;
        font-size: 2.5rem;
        margin-bottom: 1.5rem;
        letter-spacing: 1.2px;
        color: #34495e;
    }
    .detail-content table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0 1rem;
        font-size: 1.1rem;
    }
    .detail-content th {
        text-align: left;
        width: 30%;
        color: #7f8c8d;
        padding-right: 1rem;
        font-weight: 600;
        vertical-align: top;
        text-transform: uppercase;
        letter-spacing: 1px;
    }
    .detail-content td {
        background: #ecf0f1;
        padding: 12px 18px;
        border-radius: 10px;
        box-shadow: inset 2px 2px 5px #d0d7de, inset -2px -2px 5px #ffffff;
        white-space: pre-wrap;
        color: #34495e;
    }

    .btn-back {
        display: inline-block;
        margin-top: 2rem;
        padding: 12px 28px;
        font-weight: 700;
        font-size: 1.1rem;
        color: #fff;
        background: linear-gradient(45deg, #6a11cb, #2575fc);
        border: none;
        border-radius: 50px;
        box-shadow: 0 8px 15px rgba(101, 67, 224, 0.4);
        cursor: pointer;
        transition: background 0.3s ease, transform 0.3s ease;
        text-decoration: none;
        user-select: none;
    }
    .btn-back:hover {
        background: linear-gradient(45deg, #2575fc, #6a11cb);
        transform: translateY(-3px);
        box-shadow: 0 12px 20px rgba(101, 67, 224, 0.6);
        text-decoration: none;
        color: #fff;
    }
</style>

<div class="detail-card">
    <div class="detail-image">
        @if ($pengaduan->Foto_Pengaduan)
            <img src="{{ asset('foto_pengaduan/' . $pengaduan->Foto_Pengaduan) }}" alt="Foto Pengaduan" />
        @else
            <div class="no-image">Tidak ada foto tersedia</div>
        @endif
    </div>

    <div class="detail-content">
        <h3>Detail Pengaduan</h3>
        <table>
            <tr>
                <th>Nama</th>
                <td>{{ $pengaduan->Nama }}</td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td>{{ $pengaduan->Alamat }}</td>
            </tr>
            <tr>
                <th>No HP</th>
                <td>{{ $pengaduan->No_HP }}</td>
            </tr>
            <tr>
                <th>Tanggal</th>
                <td>{{ \Carbon\Carbon::parse($pengaduan->Tanggal)->translatedFormat('d F Y') }}</td>
            </tr>
            <tr>
                <th>Pengaduan</th>
                <td>{{ $pengaduan->Pengaduan }}</td>
            </tr>
        </table>

        <a href="{{ route('pengaduan.index') }}" class="btn-back mt-4">Kembali</a>
    </div>
</div>
@endsection
