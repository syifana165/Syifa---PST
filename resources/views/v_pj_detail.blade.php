@extends('layout.v_template')

@section('title', 'Detail Penanggung Jawab')

@section('content')
<style>
    body {
        background: linear-gradient(135deg, #e0f7fa, #e8f5e9);
    }

    .glass-card {
        backdrop-filter: blur(12px);
        background: rgba(255, 255, 255, 0.65);
        border-radius: 20px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        padding: 2.5rem;
        transition: all 0.3s ease-in-out;
    }

    .glass-card:hover {
        transform: scale(1.01);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
    }

    .card-title {
        font-size: 2rem;
        font-weight: 700;
        color: #2e7d32;
        text-align: center;
        margin-bottom: 2rem;
        text-shadow: 1px 1px 2px rgba(0,0,0,0.1);
    }

    .detail-row {
        display: flex;
        align-items: center;
        margin-bottom: 1.2rem;
    }

    .detail-icon {
        font-size: 1.5rem;
        color: #43a047;
        width: 40px;
    }

    .detail-label {
        font-weight: 600;
        color: #37474f;
        width: 140px;
    }

    .detail-value {
        font-size: 1.1rem;
        color: #263238;
    }

    .btn-back {
        display: inline-flex;
        align-items: center;
        background-color: #43a047;
        color: white;
        padding: 10px 20px;
        border-radius: 30px;
        font-weight: 600;
        transition: 0.3s ease;
        box-shadow: 0 5px 15px rgba(0, 128, 0, 0.2);
    }

    .btn-back i {
        margin-right: 8px;
    }

    .btn-back:hover {
        background-color: #2e7d32;
        color: white;
        transform: translateY(-2px);
    }
</style>

<div class="container py-5 d-flex justify-content-center">
    <div class="glass-card w-100" style="max-width: 600px;">
        <div class="card-title">
            <i class="fas fa-id-badge me-2"></i>Detail Penanggung Jawab
        </div>

        <div class="detail-row">
            <div class="detail-icon"><i class="fas fa-user"></i></div>
            <div class="detail-label">Nama:</div>
            <div class="detail-value">{{ $pj->Nama }}</div>
        </div>

        <div class="detail-row">
            <div class="detail-icon"><i class="fas fa-phone-alt"></i></div>
            <div class="detail-label">No HP:</div>
            <div class="detail-value">{{ $pj->No_HP }}</div>
        </div>

        <div class="detail-row">
            <div class="detail-icon"><i class="fas fa-map-marker-alt"></i></div>
            <div class="detail-label">Alamat:</div>
            <div class="detail-value">{{ $pj->Alamat }}</div>
        </div>

        <div class="detail-row">
            <div class="detail-icon"><i class="fas fa-recycle"></i></div>
            <div class="detail-label">TPS:</div>
            <div class="detail-value">{{ $pj->TPS }}</div>
        </div>

        <div class="detail-row">
            <div class="detail-icon"><i class="fas fa-info-circle"></i></div>
            <div class="detail-label">Keterangan:</div>
            <div class="detail-value">{{ $pj->Keterangan }}</div>
        </div>

        <div class="text-end mt-4">
            <a href="{{ route('pj.index') }}" class="btn-back">
                <i class="fas fa-arrow-left"></i>Kembali
            </a>
        </div>
    </div>
</div>
@endsection
