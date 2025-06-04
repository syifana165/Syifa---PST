@extends('layout.v_program') 

@section('content')
<style>
    .hero-section {
        background-color: #f5f6fa;
        position: relative;
        padding: 60px 0;
    }

    .hero-section::before {
        content: "";
        position: absolute;
        background: url('{{ asset("images/bg-logo.png") }}') no-repeat center center;
        background-size: 400px;
        opacity: 0.05;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 0;
    }

    .content-box {
        background: white;
        padding: 30px;
        border-radius: 20px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.05);
        position: relative;
        z-index: 1;
    }

    h1 {
        font-weight: bold;
        font-size: 2.5rem;
        color: #1d5c63;
    }

    .line {
        height: 4px;
        width: 60px;
        background-color: #ff7e00;
        margin-bottom: 20px;
        border-radius: 5px;
    }
</style>

<div class="hero-section">
    <div class="container">
        <div class="content-box">
            <h1>Seminar</h1>
            <div class="line"></div>
            <p>
                Seminar ini dilakukan untuk meningkatkan kesadaran masyarakat tentang pentingnya menjaga lingkungan hidup.
                Program ini berlangsung setiap bulan dengan topik-topik seperti pengelolaan sampah, konservasi alam, dan daur ulang.
            </p>

            <h4>Seminar yang Dihadiri:</h4>
            <ul>
                <li>Seminar 1: Dampak Lingkungan terhadap Kesehatan</li>
                <li>Seminar 2: Pengelolaan Sampah di Kota</li>
                <li>Seminar 3: Edukasi Masyarakat tentang Daur Ulang</li>
            </ul>

            <h4>Jadwal:</h4>
            <p>Seminar ini biasanya dilakukan setiap bulan pada minggu ketiga dan terbuka untuk umum.</p>
            <a href="{{ route('v_halaman') }}" class="btn-back">Kembali</a>
        </div>
    </div>
</div>
@endsection
