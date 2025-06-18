@extends('layout.v_program')

@section('content')
<style>
    .hero-section {
        position: relative;
        padding: 80px 15px 60px 15px;
        overflow: hidden;
        font-family: 'Poppins', sans-serif;
        background: url('/assets/img/hh.jpg') no-repeat center center;
        background-size: cover;
        min-height: 100vh;
    }

    .hero-section::before {
        content: "";
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background: rgba(0, 0, 0, 0.3);
        pointer-events: none;
        z-index: 0;
    }

    .content-box {
        background: rgba(255, 255, 255, 0.15);
        max-width: 900px;
        margin: 0 auto 50px auto;
        padding: 40px 45px;
        border-radius: 25px;
        box-shadow: 0 16px 35px rgba(29, 92, 99, 0.1);
        position: relative;
        z-index: 1;
        transition: transform 0.3s ease;
        color: #fff;
        text-shadow: 0 0 10px rgba(0,0,0,0.9);
    }

    .content-box:hover {
        transform: translateY(-5px);
        box-shadow: 0 25px 50px rgba(29, 92, 99, 0.15);
    }

    h1 {
        font-weight: 700;
        font-size: 3rem;
        color: #fff;
        margin-bottom: 10px;
        font-family: 'Poppins', sans-serif;
        text-align: center;
        text-shadow: 0 0 15px rgba(0, 0, 0, 0.95);
    }

    .line {
        height: 5px;
        width: 80px;
        background-color: rgba(255, 126, 0, 0.85);
        margin: 0 auto 35px auto;
        border-radius: 5px;
    }

    p, ul {
        font-size: 1.15rem;
        color: #fff;
        line-height: 1.75;
        margin-bottom: 30px;
        text-align: justify;
        text-shadow: 0 0 8px rgba(0,0,0,0.9);
    }

    h4 {
        color: #ffbf59;
        margin-bottom: 15px;
        font-weight: 600;
        font-size: 1.3rem;
        text-shadow: 0 0 10px rgba(0,0,0,0.9);
    }

    .btn-back {
        display: inline-block;
        background-color: rgba(255, 126, 0, 0.95);
        color: #fff;
        padding: 14px 34px;
        border-radius: 30px;
        text-decoration: none;
        font-weight: 600;
        transition: background-color 0.3s ease;
        margin-top: 10px;
        box-shadow: 0 8px 25px rgba(255, 126, 0, 0.7);
    }
    .btn-back:hover {
        background-color: rgba(255, 170, 50, 1);
        box-shadow: 0 10px 30px rgba(255, 170, 50, 0.9);
        color: #fff;
    }

    .gallery {
        max-width: 900px;
        margin: 0 auto 80px auto;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
        gap: 25px;
        position: relative;
        z-index: 1;
    }

    .gallery-item {
        position: relative;
        overflow: hidden;
        border-radius: 18px;
        box-shadow: 0 8px 25px rgba(29, 92, 99, 0.2);
        cursor: pointer;
        transition: transform 0.4s ease, box-shadow 0.4s ease;
        background: #fff;
    }
    .gallery-item:hover {
        transform: scale(1.05);
        box-shadow: 0 15px 45px rgba(29, 92, 99, 0.35);
        z-index: 10;
    }

    .gallery-item img {
        width: 100%;
        height: 180px;
        object-fit: cover;
        display: block;
        border-radius: 18px 18px 0 0;
        transition: transform 0.5s ease;
    }

    .gallery-item:hover img {
        transform: scale(1.1);
    }

    .gallery-caption {
        padding: 15px 20px;
        font-size: 1rem;
        color: #1d5c63;
        font-weight: 600;
        text-align: center;
        background-color: #f5f6fa;
        border-radius: 0 0 18px 18px;
    }

    @media (max-width: 576px) {
        .hero-section {
            padding: 60px 10px 40px 10px;
        }
        h1 {
            font-size: 2.2rem;
        }
        .content-box {
            padding: 30px 20px;
        }
        p, ul {
            font-size: 1rem;
        }
        .btn-back {
            padding: 12px 28px;
            font-size: 0.95rem;
        }
        .gallery-item img {
            height: 140px;
        }
    }
</style>

<div class="hero-section">
    <div class="container">
        <div class="content-box">
            <h1>Gotong Royong Masyarakat</h1>
            <div class="line"></div>
            <p>
                Gotong royong adalah tradisi kerja sama yang sudah menjadi bagian dari budaya masyarakat Indonesia.
                Melalui gotong royong, warga bergotong-royong membantu dalam berbagai kegiatan sosial dan pembangunan lingkungan.
                Kegiatan ini mempererat silaturahmi antar warga sekaligus menciptakan lingkungan yang bersih dan nyaman untuk ditinggali.
            </p>

            <h4>Manfaat Gotong Royong:</h4>
            <ul>
                <li>Meningkatkan solidaritas dan rasa kekeluargaan antar warga.</li>
                <li>Membantu percepatan pembangunan dan pemeliharaan fasilitas umum.</li>
                <li>Menciptakan lingkungan yang bersih, sehat, dan nyaman.</li>
                <li>Menumbuhkan rasa tanggung jawab sosial dan kesadaran kolektif.</li>
                <li>Memelihara nilai-nilai budaya dan kearifan lokal.</li>
            </ul>

            <h4>Kegiatan Gotong Royong yang Telah Dilaksanakan:</h4>
            <ul>
                <li>Pembersihan lingkungan sekitar RT dan RW.</li>
                <li>Perbaikan sarana umum seperti jalan dan drainase.</li>
                <li>Penanaman pohon dan penghijauan area perumahan.</li>
                <li>Penggalangan dana untuk kegiatan sosial masyarakat.</li>
                <li>Kerja bakti bersama untuk memperbaiki fasilitas umum.</li>
                <li>Pengawasan dan pemeliharaan kebersihan lingkungan.</li>
            </ul>

            <a href="{{ route('v_halaman') }}" class="btn-back">Kembali</a>
        </div>

        <!-- Gallery Foto Gotong Royong -->
        <div class="gallery">
            <div class="gallery-item">
                <img src="/assets/img/gotong1.jpeg" alt="Pembersihan Lingkungan">
                <div class="gallery-caption">Pembersihan Lingkungan RT</div>
            </div>
            <div class="gallery-item">
                <img src="/assets/img/gotong2.jpeg" alt="Perbaikan Jalan">
                <div class="gallery-caption">Perbaikan Jalan dan Drainase</div>
            </div>
            <div class="gallery-item">
                <img src="/assets/img/gotong3.jpeg" alt="Penanaman Pohon">
                <div class="gallery-caption">Penanaman Pohon dan Penghijauan</div>
            </div>
            <div class="gallery-item">
                <img src="/assets/img/gotong4.jpeg" alt="Penggalangan Dana Sosial">
                <div class="gallery-caption">Penggalangan Dana Sosial</div>
            </div>
            <div class="gallery-item">
                <img src="/assets/img/gotong5.jpeg" alt="Kerja Bakti Bersama">
                <div class="gallery-caption">Kerja Bakti Bersama</div>
            </div>
            <div class="gallery-item">
                <img src="/assets/img/gotong6.jpeg" alt="Pemeliharaan Kebersihan">
                <div class="gallery-caption">Pemeliharaan Kebersihan Lingkungan</div>
            </div>
        </div>
    </div>
</div>
@endsection
