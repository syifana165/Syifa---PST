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
            <h1>Gotong Royong</h1>
            <div class="line"></div>
            <p>
                Program Gotong Royong adalah upaya bersama masyarakat untuk membersihkan lingkungan sekitar, mengurangi sampah, dan memperbaiki fasilitas umum. Kegiatan ini dilakukan secara berkala dengan melibatkan warga setempat.
            </p>

            <h4>Tujuan Gotong Royong:</h4>
            <ul>
                <li>Membersihkan lingkungan dari sampah dan limbah</li>
                <li>Melestarikan kebersihan di area publik</li>
                <li>Menumbuhkan rasa tanggung jawab terhadap lingkungan hidup</li>
            </ul>

            <h4>Jadwal Gotong Royong:</h4>
            <p>Program ini dilaksanakan setiap akhir pekan pada bulan-bulan tertentu, dengan lokasi yang akan diumumkan sebelumnya melalui media sosial dan pengumuman di komunitas setempat.</p>
            <a href="{{ route('v_halaman') }}" class="btn-back">Kembali</a>
        </div>
    </div>
</div>
@endsection
