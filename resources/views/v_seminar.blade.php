@extends('layout.v_program') 

@section('content')
<style>
    /* Background hero dengan gambar dan overlay lebih tipis supaya lebih jernih */
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
        background: rgba(0, 0, 0, 0.3); /* overlay lebih tipis supaya bg lebih jernih */
        pointer-events: none;
        z-index: 0;
    }

    .content-box {
        background: rgba(255, 255, 255, 0.15); /* lebih transparan */
        max-width: 900px;
        margin: 0 auto 50px auto;
        padding: 40px 45px;
        border-radius: 25px;
        box-shadow: 0 16px 35px rgba(29, 92, 99, 0.1);
        position: relative;
        z-index: 1;
        transition: transform 0.3s ease;
        color: #fff; /* teks putih */
        text-shadow: 0 0 10px rgba(0,0,0,0.9); /* glow lebih jelas */
    }

    .content-box:hover {
        transform: translateY(-5px);
        box-shadow: 0 25px 50px rgba(29, 92, 99, 0.15);
    }

    /* Judul utama */
    h1 {
        font-weight: 700;
        font-size: 3rem;
        color: #fff;
        margin-bottom: 10px;
        font-family: 'Poppins', sans-serif;
        text-align: center;
        text-shadow: 0 0 15px rgba(0, 0, 0, 0.95); /* glow lebih terang */
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
        color: #fff; /* putih terang */
        line-height: 1.75;
        margin-bottom: 30px;
        text-align: justify;
        text-shadow: 0 0 8px rgba(0,0,0,0.9); /* glow kuat supaya terbaca */
    }

    h4 {
        color: #ffbf59; /* oranye cerah */
        margin-bottom: 15px;
        font-weight: 600;
        font-size: 1.3rem;
        text-shadow: 0 0 10px rgba(0,0,0,0.9);
    }

    /* Tombol kembali */
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
            <h1>Seminar Lingkungan Hidup</h1>
            <div class="line"></div>
            <p>
                Seminar ini bertujuan untuk meningkatkan kesadaran masyarakat mengenai pentingnya menjaga dan melestarikan lingkungan hidup.
                Setiap bulan, kami mengangkat berbagai topik menarik seperti pengelolaan sampah yang efektif, konservasi alam, daur ulang, dan perubahan iklim.
                Melalui seminar ini, peserta mendapatkan wawasan baru serta inspirasi untuk berkontribusi dalam pelestarian lingkungan di sekitar mereka.
                Selain itu, seminar menghadirkan para ahli dan praktisi lingkungan yang berbagi pengalaman dan solusi praktis yang bisa diterapkan di tingkat lokal maupun nasional.
            </p>

            <h4>Topik Seminar yang Telah Dilaksanakan:</h4>
            <ul>
                <li>Seminar 1: Dampak Lingkungan terhadap Kesehatan Masyarakat – membahas bagaimana polusi udara dan limbah memengaruhi kesehatan masyarakat.</li>
                <li>Seminar 2: Strategi Pengelolaan Sampah Berbasis Komunitas – solusi inovatif pengelolaan sampah yang melibatkan masyarakat langsung.</li>
                <li>Seminar 3: Edukasi dan Praktik Daur Ulang di Rumah Tangga – teknik sederhana dan efektif untuk mengurangi limbah rumah tangga.</li>
                <li>Seminar 4: Konservasi Sumber Daya Alam untuk Masa Depan – pentingnya menjaga keanekaragaman hayati dan sumber daya alam agar tetap lestari.</li>
                <li>Seminar 5: Adaptasi dan Mitigasi Perubahan Iklim – langkah-langkah konkrit yang dapat dilakukan oleh individu dan komunitas untuk menghadapi perubahan iklim.</li>
                <li>Seminar 6: Peran Teknologi Hijau dalam Mendorong Pembangunan Berkelanjutan – teknologi terbaru untuk membantu pelestarian lingkungan.</li>
            </ul>

            <h4>Jadwal Pelaksanaan:</h4>
            <p>
                Seminar diselenggarakan secara rutin setiap bulan pada minggu ketiga, di aula utama Dinas Lingkungan Hidup.
                Kegiatan ini terbuka untuk umum dan gratis, sehingga semua lapisan masyarakat dapat berpartisipasi aktif.
                Setiap sesi juga menyediakan sesi tanya jawab dan diskusi interaktif yang membantu peserta memahami isu lingkungan lebih mendalam.
            </p>

            <a href="{{ route('v_halaman') }}" class="btn-back">Kembali</a>
        </div>

        <!-- Gallery Foto Seminar -->
        <div class="gallery">
            <div class="gallery-item">
                <img src="/assets/img/seminar1.jpeg" alt="Seminar Dampak Lingkungan">
                <div class="gallery-caption">Seminar Dampak Lingkungan terhadap Kesehatan</div>
            </div>
            <div class="gallery-item">
                <img src="/assets/img/seminar2.jpeg" alt="Pengelolaan Sampah Berbasis Komunitas">
                <div class="gallery-caption">Pengelolaan Sampah Berbasis Komunitas</div>
            </div>
            <div class="gallery-item">
                <img src="/assets/img/seminar3.jpeg" alt="Praktik Daur Ulang di Rumah Tangga">
                <div class="gallery-caption">Praktik Daur Ulang di Rumah Tangga</div>
            </div>
            <div class="gallery-item">
                <img src="/assets/img/seminar4.jpeg" alt="Konservasi Sumber Daya Alam">
                <div class="gallery-caption">Konservasi Sumber Daya Alam</div>
            </div>
            <div class="gallery-item">
                <img src="/assets/img/seminar5.jpeg" alt="Adaptasi Perubahan Iklim">
                <div class="gallery-caption">Adaptasi Perubahan Iklim</div>
            </div>
            <div class="gallery-item">
                <img src="/assets/img/seminar6.jpeg" alt="Teknologi Hijau">
                <div class="gallery-caption">Peran Teknologi Hijau</div>
            </div>
        </div>
    </div>
</div>
@endsection
