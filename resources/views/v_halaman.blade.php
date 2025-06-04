<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dinas Lingkungan Persampahan</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <style>
    html {
      scroll-behavior: smooth;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      margin: 0;
      padding: 0;
      background: url('/assets/img/hh.jpg') no-repeat center center fixed;
      background-size: cover;
      color: #333;
      padding-top: 60px;
    }

    header {
      background: #003366;
      color: white;
      padding: 10px 20px;
      position: fixed;
      width: 100%;
      top: 0;
      left: 0;
      z-index: 1000;
      box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    }

    .header-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    max-width: 1200px;
    margin: 0 auto;
    padding-left: 20px;
    padding-right: 65px; 
  }

  .logo-kiri {
    margin-left: 30; 
  }

  .logo-kiri img {
    height: 30px;
  }

  .judul-header {
    font-size: 15px;
    font-weight: bold;
    margin-left: 10px; 
    flex-grow: 5;
    text-align: left;
  }
  
    nav ul {
      list-style: none;
      display: flex;
      gap: 15px;
      margin: 0;
      padding: 0;
    }

    nav ul li a {
      color: white;
      text-decoration: none;
      font-weight: 600;
      font-size: 14px;
      padding: 8px 12px;
      border-radius: 6px;
      transition: background 0.3s;
    }

    nav ul li a:hover {
      background: rgba(255, 255, 255, 0.2);
    }

    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #fff;
      min-width: 160px;
      box-shadow: 0px 8px 16px rgba(0,0,0,0.2);
      border-radius: 6px;
    }

    nav ul li:hover .dropdown-content {
      display: block;
    }

    .dropdown-content a {
      color: #333;
      padding: 10px 14px;
      display: block;
      text-decoration: none;
      font-size: 13px;
    }

    .dropdown-content a:hover {
      background-color: #f0f0f0;
    }

    .hero-section {
      position: relative;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      height: 350px;
      text-align: center;
      color: white;
    }

    .hero-section::before {
      content: "";
      position: absolute;
      top: 0; left: 0;
      width: 100%; height: 100%;
      background: rgba(0, 47, 108, 0.3);
      z-index: 1;
    }

    .hero-section h1, .hero-section p {
      position: relative;
      z-index: 2;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.4);
    }

    .section {
      padding: 50px 20px;
      text-align: center;
      background: rgba(255, 255, 255, 0.85);
      margin: 20px auto;
      border-radius: 10px;
      max-width: 1100px;
    }

    .grid-container {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      justify-content: center;
    }

    .grid-item {
      background: #fff;
      padding: 20px;
      border-radius: 10px;
      flex: 1;
      min-width: 280px;
      box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }

    .btn {
      display: inline-block;
      padding: 10px 20px;
      background: #28a745;
      color: white;
      text-decoration: none;
      font-weight: bold;
      border-radius: 5px;
      transition: background 0.3s;
    }

    .btn:hover {
      background: #218838;
    }

    .card-container {
    display: flex;
    gap: 20px;
    overflow-x: auto;       /* agar scroll horizontal muncul */
    flex-wrap: nowrap;      /* jangan membungkus ke baris baru */
    padding-bottom: 10px;   /* agar tidak terlalu mepet bawah */
    -webkit-overflow-scrolling: touch; /* smooth scroll di iOS */
    text-align: center;
  }
    .card {
      background: #fff;
      border-radius: 10px;
      width: 280px;
      padding: 20px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      transition: transform 0.3s;
      text-align: center;
    }

    .card:hover {
      transform: translateY(-5px);
    }

    .card img {
      width: 60px;
      margin-bottom: 15px;
    }

    footer {
      background: #003366;
      color: white;
      text-align: center;
      padding: 20px;
      font-size: 14px;
    }

    @media (max-width: 768px) {
      .header-container {
        flex-direction: column;
        align-items: flex-start;
      }

      nav ul {
        flex-direction: column;
        gap: 10px;
      }

      .grid-container {
        flex-direction: column;
        align-items: center;
      }
      .layanan-container {
        display: flex;
        justify-content: center;
        align-items: flex-start;
        flex-wrap: wrap;
        gap: 30px;
        margin: 40px auto;
        max-width: 1000px;
        padding: 0 20px;
      }
    }
  </style>
</head>
<body>

<header>
  <div class="header-container">
    <div class="logo-kiri">
      <img src="/assets/img/Logoo.png" alt="Logo Dinas">
    </div>
    <div class="judul-header">Dinas Lingkungan Hidup Persampahan</div>
    <nav>
      <ul>
        <li><a href="#beranda"><i class="fas fa-home"></i> Beranda</a></li>
        <li><a href="#tentang-kami"><i class="fas fa-info-circle"></i> Tentang Kami</a></li>
        <li><a href="#layanan"><i class="fas fa-cogs"></i> Layanan Online</a></li>
        <li class="dropdown">
          <a href="#program"><i class="fas fa-tasks"></i> Program</a>
          <div class="dropdown-content">
            <a href="{{ route('seminar') }}">Seminar</a>
            <a href="{{ route('bersih') }}">Bersih-Bareng</a>
          </div>
        </li>
        <li><a href="#berita"><i class="fas fa-newspaper"></i> Berita</a></li>
        <li class="dropdown">
          <a href="#kontak"><i class="fas fa-envelope"></i> Kontak</a>
          <div class="dropdown-content">
            <a href="{{ route('penanggungjawab') }}">Penanggung Jawab</a>
            <a href="{{ route('pengaduandata') }}">Pengaduan</a>
          </div>
          <li><a href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> Login</a></li>
        </li>
      </ul>
    </nav>
  </div>
</header>

<section id="beranda" class="hero-section">
  <h1>Selamat Datang di Website Dinas Lingkungan Persampahan</h1>
  <p>Bersama kita wujudkan lingkungan yang bersih, sehat, dan lestari.</p>
</section>

<section id="tentang-kami" class="section">
  <h2>Tentang Kami</h2>
  <div class="grid-container">
    <div class="grid-item">
      <h3>Misi Kami</h3>
      <p>Mengelola sampah secara efektif dan berkelanjutan.</p>
    </div>
    <div class="grid-item">
      <h3>Visi Kami</h3>
      <p>Menjadi yang terdepan dalam kebersihan lingkungan.</p>
    </div>
    <div class="grid-item">
      <h3>Tujuan Kami</h3>
      <ul>
        <li>Meningkatkan kesadaran masyarakat.</li>
        <li>Menerapkan sistem berbasis teknologi.</li>
        <li>Mengurangi dampak negatif limbah.</li>
      </ul>
    </div>
  </div>
</section>

<section id="layanan" class="section">
  <h2>Layanan Online</h2>
  <div class="card-container">
    <div class="card">
      <img src="assets/img/pengaduan.jpg" alt="Pengaduan">
      <h4>Form Pengaduan</h4>
      <p>Ajukan keluhan Anda langsung melalui sistem kami.</p>
      <a href="{{ route('form.store') }}" class="btn">Pengaduan</a>
    </div>
    <div class="card">
      <img src="assets/img/feedback.jpg" alt="Feedback">
      <h4>Form Feedback</h4>
      <p>Berikan masukan atau saran untuk peningkatan layanan kami.</p>
      <a href="{{ route('feedback.form') }}" class="btn">Feedback</a>
    </div>
    <div class="card">
      <img src="assets/img/laporan.jpg" alt="Laporan">
      <h4>Form Laporan Petugas</h4>
      <p>Petugas dapat melaporkan tugasnya dengan mudah di sini.</p>
      <a href="{{ route('login') }}" class="btn">Laporan</a>
    </div>
  </div>
</section>

<section id="info-berita-sampah" class="section" style="background: #f7f9fc;">
  <h2 style="font-size: 28px; margin-bottom: 30px;">Info Berita Sampah</h2>
  <div class="card-container">
    @forelse($laporan as $item)
      <div class="card" style="padding: 0; overflow: hidden; text-align: left;">
        <div style="height: 160px; overflow: hidden;">
          @if($item->upload_foto && file_exists(public_path('Foto_Laporan/' . $item->upload_foto)))
            <img src="{{ asset('Foto_Laporan/' . $item->upload_foto) }}" alt="Foto Tugas" style="width: 100%; height: 100%; object-fit: cover;">
          @else
            <img src="{{ asset('img/default.jpg') }}" alt="Default Foto" style="width: 100%; height: 100%; object-fit: cover;">
          @endif
        </div>
        <div style="padding: 15px;">
          <h4 style="font-size: 18px; color: #003366;">{{ $item->nama }}</h4>
          <p style="font-size: 14px; color: #444;">{{ \Illuminate\Support\Str::limit($item->deskripsi_tugas, 100) }}</p>
          <div style="font-size: 12px; color: #888; margin-top: 8px;">
            <i class="fas fa-calendar-alt"></i> {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}
          </div>
        </div>
      </div>
    @empty
      <p>Tidak ada info berita saat ini.</p>
    @endforelse
  </div>
  <section id="media-kontak" class="section" style="background: #f7f9fc; color: #003366; text-align: center;">
  <h2 style="font-size: 28px; margin-bottom: 20px; color: #003366;">Media & Kontak Kami</h2>
  <div style="display: flex; justify-content: center; gap: 40px; flex-wrap: wrap; font-size: 16px;">
    <div>
      <i class="fab fa-instagram" style="font-size: 28px; color: #003366;"></i>
      <p><a href="https://instagram.com/username" target="_blank" style="color: #003366; text-decoration: none;">@dlhsubang</a></p>
    </div>
    <div>
      <i class="fas fa-envelope" style="font-size: 28px; color: #003366;"></i>
      <p><a href="mailto:info@dinaslingkungan.go.id" style="color: #003366; text-decoration: none;">info@dinaslingkungan.go.id</a></p>
    </div>
    <div>
      <i class="fas fa-phone" style="font-size: 28px; color: #003366;"></i>
      <p><a href="tel:+62123456789" style="color: #003366; text-decoration: none;">+62 123 4567 89</a></p>
    </div>
    <div>
      <i class="fas fa-map-marker-alt" style="font-size: 28px; color: #003366;"></i>
      <p>Jl.Ks Tubun No.16 Subang</p>
    </div>
  </div>
</section>



<footer>
  <p>&copy; 2025 Dinas Lingkungan Persampahan | <a href="#" style="color:#fff; text-decoration:underline;">Kebijakan Privasi</a> | <a href="#" style="color:#fff; text-decoration:underline;">Syarat & Ketentuan</a></p>
</footer>

</body>
</html>
