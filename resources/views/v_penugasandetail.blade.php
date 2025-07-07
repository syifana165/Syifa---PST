@extends('layout.v_template')

@section('title', 'Detail Penugasan')

@section('content')
<style>
    .glass-card {
        backdrop-filter: blur(10px);
        background: rgba(255, 255, 255, 0.75);
        border-radius: 20px;
        padding: 2rem;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        max-width: 600px;
        margin: auto;
    }

    .glass-card h3 {
        text-align: center;
        font-weight: bold;
        color: #2e7d32;
        margin-bottom: 1.5rem;
    }

    .detail-row {
        display: flex;
        margin-bottom: 1rem;
    }

    .detail-label {
        width: 150px;
        font-weight: 600;
        color: #455a64;
    }

    .detail-value {
        color: #212121;
    }

    .btn-back {
        display: inline-flex;
        align-items: center;
        background-color: #2e7d32;
        color: white;
        padding: 10px 20px;
        border-radius: 30px;
        font-weight: 600;
        transition: 0.3s ease;
        box-shadow: 0 5px 15px rgba(0, 128, 0, 0.2);
        text-decoration: none;
    }

    .btn-back i {
        margin-right: 8px;
    }

    .btn-back:hover {
        background-color: #1b5e20;
        transform: translateY(-2px);
        color: white;
    }
</style>

<div class="container py-5">
    <div class="glass-card">
        <h3><i class="fas fa-info-circle me-2"></i>Detail Penugasan</h3>

        <div class="detail-row">
            <div class="detail-label">Nama Petugas:</div>
            <div class="detail-value">{{ $penugasan->petugas->Nama ?? '-' }}</div>
        </div>

        <div class="detail-row">
            <div class="detail-label">Kelompok Petugas:</div>
            <div class="detail-value">{{ $penugasan->kelompok_petugas }}</div>
        </div>

        <div class="detail-row">
            <div class="detail-label">Tanggal Pengaduan:</div>
            <div class="detail-value">
                {{ optional($penugasan->pengaduan)->Tanggal ? \Carbon\Carbon::parse($penugasan->pengaduan->Tanggal)->format('d-m-Y') : '-' }}
            </div>
        </div>

        <div class="detail-row">
            <div class="detail-label">Alamat:</div>
            <div class="detail-value">{{ $penugasan->pengaduan->Alamat ?? '-' }}</div>
        </div>

        <div class="detail-row">
            <div class="detail-label">Isi Pengaduan:</div>
            <div class="detail-value">{{ $penugasan->pengaduan->Pengaduan ?? '-' }}</div>
        </div>

        <div class="detail-row">
            <div class="detail-label">Status:</div>
            <div class="detail-value"><span class="badge bg-info">{{ $penugasan->pengaduan->status ?? '-' }}</span></div>
        </div>

        <div class="text-end mt-4">
            <a href="{{ route('penugasan.index') }}" class="btn-back">
                <i class="fas fa-arrow-left"></i>Kembali
            </a>
        </div>
    </div>
</div>
@endsection
