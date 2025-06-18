<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dinas Lingkungan Hidup Persampahan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <style>
    * {
      box-sizing: border-box;
    }
    body {
      margin: 0;
      font-family: 'Roboto', sans-serif;
      background: #f4f6f8;
    }
    header {
      position: fixed;
      top: 0;
      width: 100%;
      z-index: 999;
      background: rgba(0, 34, 68, 0.9);
      backdrop-filter: blur(10px);
      box-shadow: 0 4px 10px rgba(0,0,0,0.3);
    }
    .navbar-brand img {
      height: 40px;
    }
    .hero {
      position: relative;
      height: 100vh;
      overflow: hidden;
    }
    .hero video, .hero iframe {
      position: absolute;
      top: 0; left: 0;
      width: 100%; height: 100%;
      object-fit: cover;
      z-index: 0;
    }
    .hero-overlay {
      position: absolute;
      top: 0; left: 0;
      width: 100%; height: 100%;
      background: rgba(0,0,0,0.5);
      z-index: 1;
    }
    .hero-content {
      position: relative;
      z-index: 2;
      text-align: center;
      color: white;
      padding-top: 200px;
    }
    .hero-content h1 {
      font-size: 35px;
      font-weight: bold;
    }
    .hero-content p {
      font-size: 22px;
    }
    .section {
      padding: 80px 20px;
    }
    .section-title {
      text-align: center;
      font-size: 36px;
      color: #003366;
      margin-bottom: 40px;
      font-weight: bold;
    }
    .card-custom {
      border-radius: 16px;
      box-shadow: 0 8px 24px rgba(0,0,0,0.1);
      transition: all 0.3s ease;
      border: none;
      background: white;
    }
    .card-custom:hover {
      transform: translateY(-5px);
    }
    .icon-large {
      font-size: 48px;
      margin-bottom: 15px;
    }
    .statistic-box {
      background: linear-gradient(135deg, #00b894, #0984e3);
      color: white;
      border-radius: 12px;
      padding: 30px;
      text-align: center;
      margin-bottom: 20px;
    }
    .statistic-box h3 {
      font-size: 36px;
    }
    .video-embed {
      width: 100%;
      height: 350px;
      border: none;
      border-radius: 12px;
    }
    footer {
      background: #002244;
      color: white;
      text-align: center;
      padding: 40px 0;
      margin-top: 60px;
    }

    .section.bg-light {
      background: #f6f9fc;
    }

    .card-custom {
      border-radius: 20px;
      background: #ffffff;
      transition: transform 0.3s, box-shadow 0.3s;
      overflow: hidden;
    }

    .card-custom:hover {
      transform: translateY(-8px);
      box-shadow: 0 15px 30px rgba(0, 255, 208, 0.3);
    }

    .card-body h5 {
      color: #004d40;
      font-weight: 600;
    }

    .header-container {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 10px 20px; /* semula 10px 40px, sekarang kiri lebih sempit */
      max-width: 100%; /* agar tidak dibatasi 1200px */
      margin: 0; /* hilangkan auto center */
      flex-wrap: nowrap;
    }

    .logo-kiri {
      display: flex;
      align-items: center;
    }

    .logo-kiri img.logo-img {
      height: 35px;
    }

    .judul-header {
      font-size: 16px;
      color: white;
      font-weight: 600;
      white-space: nowrap;
      margin-left: 6px; /* jarak dari logo */
    }
        nav ul {
          list-style: none;
          display: flex;
          gap: 25px;
          margin: 0;
          padding: 0;
        }

        nav ul li {
          position: relative;
        }

        nav a {
          text-decoration: none;
          color: white;
          font-weight: 500;
          display: flex;
          flex-direction: row;
          align-items: center;
          gap: 8px;
          transition: all 0.3s;
        }

    /* Dropdown Tanpa Script */
    .dropdown {
      position: relative;
    }

    .dropdown-content {
      display: none;
      position: absolute;
      background: #003366;
      min-width: 160px;
      top: 100%;
      left: 0;
      z-index: 1000;
      border-radius: 6px;
      overflow: hidden;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    .dropdown-content a {
      display: block;
      padding: 10px 14px;
      color: white;
      text-decoration: none;
      white-space: nowrap;
    }

    .dropdown-content a:hover {
      background: #005599;
    }

    .dropdown:hover .dropdown-content,
    .dropdown:focus-within .dropdown-content {
      display: block;
    }

    nav ul {
      flex-wrap: nowrap; /* agar tidak turun ke bawah */
    }

    nav ul li a {
      white-space: nowrap; /* agar tulisan tidak turun baris */
    }
    @media (max-width: 768px) {
      .header-container {
        flex-direction: column;
        align-items: flex-start;
        padding: 20px;
      }

      nav ul {
        flex-direction: column;
        width: 100%;
        gap: 10px;
      }

      .judul-header {
        margin: 10px 0;
      }
    }

    .notif-count {
      position: absolute;
      top: -6px;
      right: -8px;
      background: red;
      color: white;
      font-size: 10px;
      font-weight: bold;
      padding: 2px 6px;
      border-radius: 50%;
      line-height: 1;
    }
    .social-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 60px;
        height: 60px;
        font-size: 28px;
        border-radius: 50%;
        background-color: #0d6efd;
        color: white;
        transition: all 0.3s ease;
      }

      .social-icon:hover {
        background-color: #0b5ed7;
        transform: scale(1.1);
      }
      #kontak .card-contact {
        padding: 30px 20px;
        background-color: #fff;
        border-radius: 16px;
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        height: 100%;
      }

      #kontak .card-contact:hover {
        transform: translateY(-6px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12);
      }

      #kontak .icon-circle {
        width: 64px;
        height: 64px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
        color: white;
        margin: 0 auto 15px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
      }

      #kontak .icon-circle:hover {
        transform: scale(1.1);
      }

      #kontak p.fw-semibold {
        font-size: 16px;
        margin-bottom: 0;
        color: #333;
      }

      .video-embed {
        width: 100%;
        height: 220px;
        border-radius: 12px;
        border: none;
        box-shadow: 0 6px 12px rgba(0,0,0,0.1);
      }

      .dropdown.open .dropdown-content {
        display: block;
      }

      nav ul li.position-relative a {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 10px 12px;
        height: 100%;
      }

      nav ul li a i {
        font-size: 16px;
        display: inline-block;
        line-height: 1;
      }

      nav ul {
        align-items: center;
        min-height: 50px;
      }

      nav ul li:last-child,
      nav ul li:nth-last-child(2) {
        margin-right: 0;
      }

      nav ul li:nth-last-child(2) {
        margin-right: -5px; /* Kurangi jarak antara Login dan Notifikasi */
      }

      .video-wrapper {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 0;
        overflow: hidden;
      }

      .video-wrapper iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
      }

  </style>
</head>
<body>

<!-- Navbar -->
<header>
  <div class="header-container">
    <!-- Kiri: Logo + Judul -->
    <div class="logo-kiri d-flex align-items-center">
      <img src="/assets/img/Logoo.png" alt="Logo Dinas" class="logo-img">
      <div class="judul-header ms-2">Dinas Lingkungan Hidup Persampahan</div>
    </div>

    <!-- Kanan: Navigasi -->
    <nav class="navbar-nav-custom">
      <ul>
        <li><a href="#beranda"><i class="fas fa-home"></i> Beranda</a></li>
        <li class="dropdown">
          <a href="#tentang"><i class="fas fa-info-circle"></i> Tentang Kami</a>
          <div class="dropdown-content">
            <a href="/visi">Visi Misi</a>
            <a href="/tujuan">Tujuan</a>
            <a href="/tentangkami">Tentang Kami</a>
            <a href="/profile">Profile Menteri</a>
          </div>
        </li>
        <li><a href="#layanan"><i class="fas fa-cogs"></i> Layanan Online</a></li>
        <li class="dropdown">
          <a href="#program"><i class="fas fa-tasks"></i> Program</a>
          <div class="dropdown-content">
            <a href="{{ route('seminar') }}">Seminar</a>
            <a href="{{ route('bersih') }}">Bersih-Bareng</a>
          </div>
        </li>

        <li class="dropdown">
          <a href="#kontak"><i class="fas fa-envelope"></i> Kontak</a>
          <div class="dropdown-content">
              <a href="/penanggungjawab">Penanggung Jawab</a>
              <a href="/pengaduandata">Pengaduan</a>
          </div>
        </li>
        <li><a href="/login"><i class="fas fa-sign-in-alt"></i> Login</a></li>
        <li class="position-relative">
            <a href="/pengaduandata">
            <i class="fas fa-envelope"></i>
            @if($jumlahPesanBaru > 0)
              <span class="notif-count">{{ $jumlahPesanBaru }}</span>
            @endif
          </a>
        </li>
      </ul>
    </nav>
  </div>
</header>

<!-- Hero Section -->
<section class="hero">
  <div class="video-wrapper">
    <iframe 
      src="https://www.youtube.com/embed/jncmKIIgg6I?autoplay=1&mute=1&controls=0&loop=1&playlist=jncmKIIgg6I&modestbranding=1&vq=hd1080" 
      frameborder="0" 
      allow="autoplay; fullscreen" 
      allowfullscreen>
    </iframe>
  </div>
  <div class="hero-overlay"></div>
  <div class="hero-content">
    <h1>Selamat Datang di Dinas Lingkungan Hidup Kab.Subang</h1>
    <p>Bersama menuju lingkungan bersih dan sehat</p>
  </div>
</section>

<!-- Pengaduan Masyarakat, Lokasi & QR -->
<section id="pengaduan" class="py-5" style="background-color: #e6f5ff;">
  <div class="container">
    <h2 class="fw-bold text-primary mb-5">📋 Pengaduan Masyarakat</h2>
    <div class="row g-4 align-items-stretch">
      
      <!-- Daftar Pengaduan -->
      <div class="col-lg-6">
        <div class="card shadow-sm border-0 h-100 rounded-4">
          <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center rounded-top-4">
            <h5 class="mb-0"><i class="fas fa-bullhorn"></i> Pengaduan Terbaru</h5>
            <span class="badge bg-light text-dark">{{ $pengaduanTerbaru->count() }} pengaduan</span>
          </div>
          <div class="card-body p-0 bg-white">
            @if ($pengaduanTerbaru->count())
              <ul class="list-group list-group-flush">
                @foreach ($pengaduanTerbaru as $pengaduan)
                  <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                      <div class="fw-bold text-primary">
                        <i class="fas fa-user-circle"></i> {{ $pengaduan->Nama }}
                      </div>
                      <div class="text-dark">
                        "{{ $pengaduan->Pengaduan }}"
                      </div>
                      <small class="text-muted">
                        <i class="far fa-clock"></i> {{ \Carbon\Carbon::parse($pengaduan->Tanggal)->diffForHumans() }}
                      </small>
                    </div>
                    @php
                      $status = strtolower($pengaduan->status);
                      $badgeClass = match($status) {
                        'selesai' => 'success',
                        'proses' => 'warning',
                        default => 'secondary',
                      };
                    @endphp
                    <span class="badge bg-{{ $badgeClass }} text-uppercase">{{ $pengaduan->status }}</span>
                  </li>
                @endforeach
              </ul>
            @else
              <div class="p-3 text-muted">Tidak ada pengaduan terbaru.</div>
            @endif
          </div>
        </div>
      </div>

      <!-- Lokasi + QR Code -->
      <div class="col-lg-6">
        <div class="row g-4">

          <!-- Google Maps -->
          <div class="col-12">
            <div class="card p-3 h-100 shadow-sm rounded-4 bg-white">
              <h5 class="text-center mb-3">
                <i class="fas fa-map-marker-alt text-danger me-2"></i>Lokasi DLH Kabupaten Subang
              </h5>
              <iframe 
                src="https://www.google.com/maps?q=Dinas+Lingkungan+Hidup+Kabupaten+Subang&output=embed"
                width="100%" 
                height="300" 
                style="border:0; border-radius: 12px;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
              </iframe>
            </div>
          </div>

          <!-- QR Code -->
          <div class="col-12">
            <div class="card p-3 text-center h-100 shadow-sm rounded-4 bg-white">
              <h5 class="mb-3">
                <i class="fas fa-qrcode text-success me-2"></i>Scan untuk Isi Pengaduan
              </h5>
              <img 
                src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=http://192.168.1.10:8000/form"
                alt="QR Form Pengaduan" 
                class="img-fluid rounded mx-auto" 
                style="max-width: 150px;"
              />
              <p class="mt-3">Arahkan kamera Anda ke barcode untuk langsung menuju Form Pengaduan Online.</p>
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>
</section>


<!-- Layanan -->
<section id="layanan-online" class="py-5" style="background-color: #e6f5ff;">
  <div class="container text-center">
    <h2 class="mb-5 fw-bold text-primary">💼 Layanan Dinas Lingkungan Hidup</h2>
    <div class="row justify-content-center g-4">

      <!-- Pengaduan -->
      <div class="col-6 col-md-2">
        <a href="{{ route('form.store') }}" class="layanan-box">
          <div class="layanan-icon">
            <img src="https://img.icons8.com/color/96/000000/customer-support.png" alt="Pengaduan">
          </div>
          <p class="layanan-title">Pengaduan</p>
        </a>
      </div>

      <!-- Feedback -->
      <div class="col-6 col-md-2">
        <a href="{{ route('feedback.form') }}" class="layanan-box">
          <div class="layanan-icon">
            <img src="https://img.icons8.com/color/96/000000/feedback.png" alt="Feedback">
          </div>
          <p class="layanan-title">Kritik & Saran</p>
        </a>
      </div>

      <!-- Laporan Petugas -->
      <div class="col-6 col-md-2">
        <a href="{{ route('login') }}" class="layanan-box">
          <div class="layanan-icon">
            <img src="https://img.icons8.com/color/96/000000/task.png" alt="Laporan Petugas">
          </div>
          <p class="layanan-title">Laporan Petugas</p>
        </a>
      </div>
      
      <!-- Data Petugas -->
      <div class="col-6 col-md-2">
        <a href="{{ route('data.petugas_public') }}" class="layanan-box">
            <div class="layanan-icon">
                <img src="https://img.icons8.com/color/96/000000/conference.png" alt="Data Petugas">
            </div>
            <p class="layanan-title">Data Petugas</p>
        </a>
    </div>
    </div>
  </div>
</section>

<style>
  .layanan-box {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-decoration: none;
    background: #ffffff;
    padding: 25px 15px;
    border-radius: 20px;
    border: 2px solid #d6ecff;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    transition: all 0.3s ease;
    height: 100%;
  }

  .layanan-box:hover {
    transform: translateY(-5px);
    border-color: #3399ff;
    box-shadow: 0 10px 25px rgba(51, 153, 255, 0.25);
  }

  .layanan-icon {
    width: 70px;
    height: 70px;
    margin-bottom: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .layanan-icon img {
    width: 100%;
    height: auto;
  }

  .layanan-title {
    margin: 0;
    font-weight: 600;
    font-size: 16px;
    color: #004d2c;
  }

  @media (max-width: 768px) {
    .layanan-box {
      padding: 20px 10px;
    }

    .layanan-title {
      font-size: 14px;
    }
  }
</style>

<!-- Berita & Video -->
<section id="berita" class="py-5" style="background-color: #e6f5ff;">
  <div class="container">
    <h2 class="text-center fw-bold text-primary mb-5">📰 Berita & Video</h2>
    <div class="row">
      <div class="col-md-6">
        <iframe class="video-embed" src="https://www.youtube.com/embed/xVjsb97pDk8" allowfullscreen></iframe>
      </div>
      <div class="col-md-6">
        <div class="card p-4 shadow-sm rounded-4 bg-white">
          <h5 class="mb-3 text-primary">Berita Terbaru</h5>
          <ul class="mb-0">
            <li><strong>12 Juni:</strong> DLH luncurkan program zona bebas sampah</li>
            <li><strong>08 Juni:</strong> Penanaman 500 pohon</li>
            <li><strong>05 Juni:</strong> Hari Lingkungan Hidup</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Video Edukasi -->
<!-- Video Edukasi -->
<section id="edukasi" class="py-5" style="background-color: #e6f5ff;">
  <div class="container">
    <h2 class="text-center fw-bold text-primary mb-5">🎥 Edukasi Dinas Lingkungan Hidup</h2>
    <div class="row g-4">
      <div class="col-md-4">
        <iframe class="video-embed" src="https://www.youtube.com/embed/v-khsWM_5RQ" title="Sosialisasi Pengelolaan Sampah" allowfullscreen></iframe>
        <p class="mt-2 text-center fw-semibold">Sosialisasi Pengelolaan Sampah</p>
      </div>
      <div class="col-md-4">
        <iframe class="video-embed" src="https://www.youtube.com/embed/UelzucE1f9Y" title="Program DLH Terbaru" allowfullscreen></iframe>
        <p class="mt-2 text-center fw-semibold">Program DLH Terbaru</p>
      </div>
      <div class="col-md-4">
        <iframe class="video-embed" src="https://www.youtube.com/embed/dgA65a-jYRA" title="Kegiatan Lapangan DLH" allowfullscreen></iframe>
        <p class="mt-2 text-center fw-semibold">Kegiatan Lapangan DLH</p>
      </div>
    </div>
  </div>
</section>

<!-- Kontak -->
<section id="kontak" class="py-5" style="background-color: #e6f5ff;">
  <div class="container">
    <h2 class="text-center mb-5 fw-bold text-primary">📞 Kontak & Sosial Media</h2>
    <div class="row text-center gy-4 justify-content-center">

      <!-- Instagram -->
      <div class="col-md-3">
        <div class="p-4 bg-white shadow-sm card-contact rounded-4">
          <div class="icon-circle mx-auto" style="background: linear-gradient(135deg, #f09433, #e6683c, #dc2743, #cc2366, #bc1888);">
            <i class="fab fa-instagram text-white"></i>
          </div>
          <p class="fw-semibold mb-0 mt-2">@dlhsubang</p>
        </div>
      </div>

      <!-- Email -->
      <div class="col-md-3">
        <div class="p-4 bg-white shadow-sm card-contact rounded-4">
          <div class="icon-circle mx-auto bg-primary text-white">
            <i class="fas fa-envelope"></i>
          </div>
          <p class="fw-semibold mb-0 mt-2">info@dlh.go.id</p>
        </div>
      </div>

      <!-- Telepon -->
      <div class="col-md-3">
        <div class="p-4 bg-white shadow-sm card-contact rounded-4">
          <div class="icon-circle mx-auto bg-success text-white">
            <i class="fas fa-phone-alt"></i>
          </div>
          <p class="fw-semibold mb-0 mt-2">+62 812 3456 7890</p>
        </div>
      </div>

      <!-- Lokasi -->
      <div class="col-md-3">
        <div class="p-4 bg-white shadow-sm card-contact rounded-4">
          <div class="icon-circle mx-auto bg-dark text-white">
            <i class="fas fa-map-marker-alt"></i>
          </div>
          <p class="fw-semibold mb-0 mt-2">Subang, Jawa Barat</p>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- CSS Tambahan -->
<style>
.video-embed {
  width: 100%;
  height: 200px;
  border-radius: 12px;
  border: none;
  box-shadow: 0 4px 10px rgba(0,0,0,0.1);
}

.icon-circle {
  width: 60px;
  height: 60px;
  border-radius: 50%;
  font-size: 24px;
  display: flex;
  align-items: center;
  justify-content: center;
}
</style>




<!-- Footer -->
<footer>
  <p>&copy; 2025 Dinas Lingkungan Hidup Persampahan. All rights reserved.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>