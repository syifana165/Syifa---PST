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
      background: #ffffff;
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

      .hover-zoom {
        transition: transform 0.3s ease;
      }
      .hover-zoom:hover {
        transform: scale(1.05);
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
<section class="hero" style="position: relative; height: 100vh; overflow: hidden;">
  <!-- Ganti video dengan gambar -->
  <div class="image-wrapper" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;">
    <img src="{{ asset('assets/img/hh.jpg') }}" alt="Hero Image" style="width: 100%; height: 100%; object-fit: cover;">
  </div>

  <!-- Overlay gelap di atas gambar -->
  <div class="hero-overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5);"></div>

  <!-- Konten di atas gambar -->
  <div class="hero-content" style="position: relative; z-index: 1; color: #fff; text-align: center; top: 50%; transform: translateY(-50%); padding: 0 20px;">
    <h1>Selamat Datang di Dinas Lingkungan Hidup Kab.Subang</h1>
    <p>Bersama menuju lingkungan bersih dan sehat</p>
  </div>
</section>

<section style="background-color: #f9f9f9; padding: 20px 40px; border-top: 4px solid #ffc107;">
  <div class="container" style="display: flex; flex-direction: column; align-items: flex-start;">
    <img src="{{ asset('assets/img/logo.jpg') }}" alt="Logo DLH Jawa Barat" style="max-height: 80px; margin-bottom: 10px;">
    <h3 style="color: #444; font-weight: bold; margin: 0;">
      Dinas Lingkungan Hidup Persampahan Kab.Subang
    </h3>
  </div>
</section>

<section id="berita-terkini" class="py-5 bg-white">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <div>
        <h2 class="fw-bold text-dark mb-0">Berita Terkini</h2>
        <p class="text-muted" style="max-width: 600px;">
        Berikut berita terkini yang ada pada Dinas Lingkungan Hidup, Mencakup Semua Berita 
      </p>
      </div>
    </div>

    <div class="row g-4">
      <!-- Card Berita 1 -->
      <div class="col-md-4">
        <div class="card border-0 shadow-sm h-100">
        <img src="assets/img/berita1.jpg" class="card-img-top" alt="Hari Lingkungan">
          <div class="card-body">
            <small class="text-muted d-block mb-1">Senin, 02 Juni 2025</small>
            <h5 class="card-title fw-semibold">Hari Lingkungan Hidup Sedunia 2025</h5>
            <p class="card-text small">DLH kampanyekan "Hentikan Polusi Plastik" menjelang Hari Lingkungan Hidup Sedunia.</p>
          </div>
        </div>
      </div>

      <!-- Card Berita 2 -->
      <div class="col-md-4">
        <div class="card border-0 shadow-sm h-100">
        <img src="assets/img/berita2.jpg" class="card-img-top" alt="WTP Kab.Subang">
          <div class="card-body">
            <small class="text-muted d-block mb-1">Rabu, 28 Mei 2025</small>
            <h5 class="card-title fw-semibold">Provinsi Jawa Barat Raih Opini WTP ke-14</h5>
            <p class="card-text small">DLH turut mendukung transparansi dalam pelaporan keuangan daerah.</p>
          </div>
        </div>
      </div>

      <!-- Card Berita 3 -->
      <div class="col-md-4">
        <div class="card border-0 shadow-sm h-100">
        <img src="assets/img/berita3.jpeg" class="card-img-top" alt="Anugrah Bangga">
          <div class="card-body">
            <small class="text-muted d-block mb-1">Senin, 18 Desember 2023</small>
            <h5 class="card-title fw-semibold">Jawa Barat Raih Penghargaan Anugerah Bangga B</h5>
            <p class="card-text small">Penghargaan diberikan atas kontribusi dalam pengelolaan lingkungan dan persampahan.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Pengaduan Masyarakat, Lokasi & QR -->
<section id="pengaduan" class="py-5 position-relative" style="background: #ffffff; overflow: hidden;">

  <div class="container position-relative" style="z-index: 1;">
    <div class="text-start mb-4">
      <h2 class="fw-bold" style="color: #092c52; font-size: 2.2rem;"> Sistem Pengaduan Masyarakat</h2>
      <p class="text-muted" style="max-width: 600px;">
        Sampaikan aspirasi, kritik, dan pengaduan Anda secara langsung kepada Dinas Lingkungan Hidup Kabupaten Subang untuk lingkungan yang lebih baik.
      </p>
    </div>

    <div class="row g-4 align-items-stretch">

      <!-- Pengaduan Terbaru -->
      <div class="col-lg-6">
        <div class="card border-0 shadow-lg rounded-4" style="animation: fadeUp 1s;">
          <div class="card-header text-white d-flex justify-content-between align-items-center rounded-top-4"
               style="background: linear-gradient(90deg, #00b09b, #96c93d);">
            <h5 class="mb-0"><i class="fas fa-bullhorn"></i> Pengaduan Terbaru</h5>
            <span class="badge bg-light text-dark">{{ $pengaduanTerbaru->count() }} pengaduan</span>
          </div>
          <div class="card-body p-0">
            @if ($pengaduanTerbaru->count())
              <ul class="list-group list-group-flush">
                @foreach ($pengaduanTerbaru as $pengaduan)
                  <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                      <div class="fw-semibold text-primary">
                        <i class="fas fa-user-circle"></i> {{ $pengaduan->Nama }}
                      </div>
                      <div class="text-muted">"{{ $pengaduan->Pengaduan }}"</div>
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
              <div class="p-3 text-muted">Belum ada pengaduan yang masuk.</div>
            @endif
          </div>
        </div>
      </div>

      <!-- Maps dan QR -->
      <div class="col-lg-6">
        <div class="row g-4">

          <!-- Lokasi -->
          <div class="col-12">
            <div class="card p-3 shadow-lg rounded-4 border-0" style="animation: fadeUp 1.2s;">
              <h5 class="text-center mb-3 text-dark">
                <i class="fas fa-map-marker-alt text-danger me-2"></i> Lokasi DLH Kabupaten Subang
              </h5>
              <iframe 
                src="https://www.google.com/maps?q=Dinas+Lingkungan+Hidup+Kabupaten+Subang&output=embed"
                width="100%" 
                height="300" 
                style="border:0; border-radius: 12px;" 
                allowfullscreen 
                loading="lazy">
              </iframe>
            </div>
          </div>

          <!-- QR Code -->
          <div class="col-12">
            <div class="card p-4 text-center shadow-lg rounded-4 border-0" style="animation: fadeUp 1.4s;">
              <h5 class="mb-3 text-success">
                <i class="fas fa-qrcode me-2"></i> Scan untuk Isi Pengaduan
              </h5>
              <div class="d-flex justify-content-center">
                <img 
                  src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=http://192.168.1.10:8000/form"
                  alt="QR Form Pengaduan" 
                  class="img-fluid rounded shadow-sm hover-zoom" 
                  style="max-width: 160px;"
                />
              </div>
              <p class="mt-3 text-muted small">Arahkan kamera ke barcode untuk akses form pengaduan online DLH Subang.</p>
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>
</section>

<!-- Animasi -->
<style>
@keyframes fadeUp {
  from {
    opacity: 0;
    transform: translateY(30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}
.hover-zoom {
  transition: transform 0.3s ease;
}
.hover-zoom:hover {
  transform: scale(1.08);
}
</style>

<!-- Layanan -->
<section id="layanan-online" class="py-5" style="background: #ffffff;">
  <div class="container">
    <div class="mb-5">
      <h2 class="fw-bold text-start" style="color: #01579b;">Layanan Dinas Lingkungan Hidup</h2>
      <p class="text-muted text-start" style="max-width: 600px; font-size: 15px;">
        Layanan digital untuk masyarakat menyampaikan pengaduan, saran, dan mengakses data petugas secara mudah dan cepat.
      </p>
    </div>

    <div class="row g-4">

      <!-- Pengaduan -->
      <div class="col-6 col-md-3">
        <a href="{{ route('form.store') }}" class="layanan-box-new">
          <div class="layanan-icon-new" style="background-color: #2196f3;">
            <svg width="40" height="40" fill="#fff" viewBox="0 0 24 24">
              <path d="M18.707 17.293l-1.414 1.414L12 13.414 6.707 18.707l-1.414-1.414L10.586 12 5.293 6.707 6.707 5.293 12 10.586l5.293-5.293 1.414 1.414L13.414 12l5.293 5.293z"/>
            </svg>
          </div>
          <p class="layanan-title-new">Pengaduan</p>
        </a>
      </div>

      <!-- Kritik & Saran -->
      <div class="col-6 col-md-3">
        <a href="{{ route('feedback.form') }}" class="layanan-box-new">
          <div class="layanan-icon-new" style="background-color: #fbc02d;">
            <svg width="40" height="40" fill="#fff" viewBox="0 0 24 24">
              <path d="M20 2H4a2 2 0 0 0-2 2v20l4-4h14a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2z"/>
            </svg>
          </div>
          <p class="layanan-title-new">Kritik & Saran</p>
        </a>
      </div>

      <!-- Laporan Petugas -->
      <div class="col-6 col-md-3">
        <a href="{{ route('login') }}" class="layanan-box-new">
          <div class="layanan-icon-new" style="background-color: #4caf50;">
            <svg width="40" height="40" fill="#fff" viewBox="0 0 24 24">
              <path d="M3 6h18v2H3V6zm0 5h18v2H3v-2zm0 5h12v2H3v-2z"/>
            </svg>
          </div>
          <p class="layanan-title-new">Laporan Petugas</p>
        </a>
      </div>

      <!-- Data Petugas -->
      <div class="col-6 col-md-3">
        <a href="{{ route('data.petugas_public') }}" class="layanan-box-new">
          <div class="layanan-icon-new" style="background-color: #e53935;">
            <svg width="40" height="40" fill="#fff" viewBox="0 0 24 24">
              <path d="M12 12c2.21 0 4-1.79 4-4S14.21 4 12 4s-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
            </svg>
          </div>
          <p class="layanan-title-new">Data Petugas</p>
        </a>
      </div>

    </div>
  </div>
</section>

<style>
.layanan-box-new {
  background: #ffffff;
  border-radius: 16px;
  padding: 28px 20px;
  text-align: center;
  box-shadow: 0 6px 20px rgba(0,0,0,0.06);
  transition: all 0.3s ease;
  text-decoration: none;
  display: flex;
  flex-direction: column;
  align-items: center;
}

.layanan-box-new:hover {
  transform: translateY(-5px);
  box-shadow: 0 12px 28px rgba(0, 123, 255, 0.15);
}

.layanan-icon-new {
  width: 80px;
  height: 80px;
  border-radius: 50%;
  margin-bottom: 15px;
  display: flex;
  align-items: center;
  justify-content: center;
  box-shadow: inset 0 0 10px rgba(0,0,0,0.05);
}

.layanan-title-new {
  font-size: 16px;
  font-weight: 600;
  color: #01579b;
  margin: 0;
}

@media (max-width: 768px) {
  .layanan-title-new {
    font-size: 14px;
  }
}
</style>


<!-- Berita & Video -->
<section id="edukasi" class="py-5" style="background: #ffffff;">
      <div class="container">
      <div class="d-flex align-items-center mb-4">
      <div>
        <h2 class="fw-bold text-dark mb-0">Tips Ramah Lingkungan</h2>
        <p class="text-muted mb-0" style="font-size: 0.95rem;">
          Langkah kecilmu hari ini, pengaruh besar untuk bumi besok 🌏
        </p>
      </div>
    </div>
    <div class="row g-4">

      <!-- Tip 1 -->
      <div class="col-md-12">
        <div class="d-flex justify-content-between align-items-center p-4 rounded-4 shadow-sm hover-card bg-white">
          <div class="d-flex align-items-center">
            <div class="icon-wrapper me-4">
              <img src="https://img.icons8.com/fluency/64/shopping-bag.png" alt="Tote Bag">
            </div>
            <div>
              <h5 class="fw-bold text-info mb-1">Kurangi Sampah Plastik</h5>
              <p class="text-muted small mb-0">Gunakan tote bag dan botol minum sendiri agar lebih hemat dan bersih.</p>
            </div>
          </div>
          <img src="{{ asset('assets/img/sasa.jpeg') }}" alt="Gambar Sampah" width="100" class="img-thumbnail d-none d-md-block" data-bs-toggle="modal" data-bs-target="#modalSampah">
        </div>
      </div>

      <!-- Tip 2 -->
      <div class="col-md-12">
        <div class="d-flex justify-content-between align-items-center p-4 rounded-4 shadow-sm hover-card bg-white">
          <div class="d-flex align-items-center">
            <div class="icon-wrapper me-4">
              <img src="https://img.icons8.com/color/64/light-on--v1.png" alt="Energy Icon">
            </div>
            <div>
              <h5 class="fw-bold text-warning mb-1">Hemat Energi</h5>
              <p class="text-muted small mb-0">Cabut charger saat tidak digunakan dan gunakan lampu LED.</p>
            </div>
          </div>
          <img src="{{ asset('assets/img/hemat.png') }}" alt="Gambar Energi" width="100" class="img-thumbnail d-none d-md-block" data-bs-toggle="modal" data-bs-target="#modalEnergi">
        </div>
      </div>

      <!-- Tip 3 -->
      <div class="col-md-12">
        <div class="d-flex justify-content-between align-items-center p-4 rounded-4 shadow-sm hover-card bg-white">
          <div class="d-flex align-items-center">
            <div class="icon-wrapper me-4">
              <img src="https://img.icons8.com/color/64/water.png" alt="Water Icon">
            </div>
            <div>
              <h5 class="fw-bold text-primary mb-1">Hemat Air</h5>
              <p class="text-muted small mb-0">Matikan keran saat sikat gigi dan gunakan air secukupnya saat mencuci.</p>
            </div>
          </div>
          <img src="{{ asset('assets/img/air.jpeg') }}" alt="Gambar Air" width="100" class="img-thumbnail d-none d-md-block" data-bs-toggle="modal" data-bs-target="#modalAir">
        </div>
      </div>

    </div>
  </div>
</section>

<!-- Modal: Gambar Sampah -->
<div class="modal fade" id="modalSampah" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-white border-0 text-center p-3">
      <img src="{{ asset('assets/img/sasa.jpeg') }}" class="modal-image img-fluid rounded" alt="Sampah Plastik">
    </div>
  </div>
</div>

<!-- Modal: Gambar Energi -->
<div class="modal fade" id="modalEnergi" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-white border-0 text-center p-3">
      <img src="{{ asset('assets/img/hemat.png') }}" class="modal-image img-fluid rounded" alt="Hemat Energi">
    </div>
  </div>
</div>

<!-- Modal: Gambar Air -->
<div class="modal fade" id="modalAir" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-white border-0 text-center p-3">
      <img src="{{ asset('assets/img/air.jpeg') }}" class="modal-image img-fluid rounded" alt="Hemat Air">
    </div>
  </div>
</div>


<style>
.hover-card {
  transition: all 0.3s ease;
  border: 1px solid #f0f0f0;
}
.hover-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 12px 25px rgba(0, 0, 0, 0.08);
}
.icon-wrapper {
  width: 70px;
  height: 70px;
  border-radius: 50%;
  background: #f8f9fa;
  display: flex;
  align-items: center;
  justify-content: center;
}
.img-thumbnail {
  border: none;
  border-radius: 12px;
  box-shadow: 0 2px 10px rgba(0,0,0,0.05);
  cursor: pointer;
  transition: transform 0.3s ease;
}
.img-thumbnail:hover {
  transform: scale(1.05);
}
</style>


<section id="lingkup-kerja" class="py-5 bg-white">
  <div class="container">
    <h2 class="fw-bold mb-3">Lingkup Kerja Dinas Lingkungan Hidup Kab. Subang</h2>
    <p class="text-muted mb-5" style="max-width: 700px;">
      Dinas Lingkungan Hidup dalam melaksanakan tugas pokok dan fungsinya sebagai Instansi Pemerintah yang membidangi beberapa bidang.
    </p>

    <div class="row g-4">
      <!-- Item Template -->
      <div class="col-md-6">
        <div class="p-4 rounded-4 shadow-sm h-100 border border-light-subtle bg-white hover-shadow transition">
          <div class="d-flex align-items-start">
            <i class="fas fa-user-cog fa-2x text-success me-3 mt-1"></i>
            <div>
              <h5 class="fw-bold">Sekretariat</h5>
              <p class="text-muted mb-0">Mendukung operasional organisasi dengan menyediakan layanan administrasi, serta memfasilitasi komunikasi internal dan eksternal.</p>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="p-4 rounded-4 shadow-sm h-100 border border-light-subtle bg-white hover-shadow transition">
          <div class="d-flex align-items-start">
            <i class="fas fa-seedling fa-2x text-success me-3 mt-1"></i>
            <div>
              <h5 class="fw-bold">Tata Lingkungan</h5>
              <p class="text-muted mb-0">Bidang Tata Lingkungan mempunyai tugas pokok melaksanakan sebagian tugas Dinas di bidang Tata Lingkungan.</p>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="p-4 rounded-4 shadow-sm h-100 border border-light-subtle bg-white hover-shadow transition">
          <div class="d-flex align-items-start">
            <i class="fas fa-recycle fa-2x text-success me-3 mt-1"></i>
            <div>
              <h5 class="fw-bold">Pengelolaan Sampah & Limbah B3</h5>
              <p class="text-muted mb-0">Melaksanakan sebagian tugas dinas di bidang pengelolaan sampah dan limbah B3 secara berkelanjutan dan ramah lingkungan.</p>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="p-4 rounded-4 shadow-sm h-100 border border-light-subtle bg-white hover-shadow transition">
          <div class="d-flex align-items-start">
            <i class="fas fa-exclamation-triangle fa-2x text-success me-3 mt-1"></i>
            <div>
              <h5 class="fw-bold">Pengendalian Pencemaran & Kerusakan LH</h5>
              <p class="text-muted mb-0">Melaksanakan tugas pengendalian pencemaran dan kerusakan lingkungan hidup demi keberlangsungan ekosistem yang sehat.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<style>
  .hover-shadow {
    transition: all 0.3s ease-in-out;
  }

  .hover-shadow:hover {
    box-shadow: 0 0 15px rgba(0, 128, 0, 0.15);
    transform: translateY(-3px);
  }
</style>

<!-- Video Edukasi -->
<section id="edukasi" class="py-5" style="background: #ffffff;">
  <div class="container">

    <!-- Judul dan Deskripsi -->
    <div class="mb-4">
      <h2 class="fw-bold text-dark">Edukasi Dinas Lingkungan Hidup</h2>
      <p class="text-muted" style="max-width: 600px;">
        Kumpulan video edukatif seputar program, kegiatan, dan kampanye ramah lingkungan dari Dinas Lingkungan Hidup Kabupaten Subang. Mari tingkatkan kesadaran bersama untuk lingkungan yang lebih baik.
      </p>
    </div>

    <!-- Video Grid -->
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

<!-- Optional: CSS untuk memperindah video -->
<style>
  .video-embed {
    width: 100%;
    aspect-ratio: 16 / 9;
    border: none;
    border-radius: 12px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.05);
  }
</style>


<!-- Footer -->
<footer class="text-dark mt-5 pt-5" style="background: #ffffff;">
  <div class="container">
    <div class="row gy-5">

      <!-- Alamat -->
      <div class="col-md-6 col-lg-4">
        <h6 class="fw-bold mb-3 border-bottom pb-2">📍 Alamat Kantor</h6>
        <p class="small mb-2">
          Jl. Sadang Tengah No.4-6, Sekeloa, Kec. Coblong, Kota Bandung<br>
          Jawa Barat 40133, Indonesia
        </p>
      </div>

      <!-- Laman -->
      <div class="col-md-6 col-lg-4">
        <h6 class="fw-bold mb-3 border-bottom pb-2">🔗 Tautan Terkait</h6>
        <ul class="list-unstyled small">
          <li><a href="#" class="text-decoration-none text-dark hover-text-success d-block mb-1">Visi & Misi</a></li>
          <li><a href="#" class="text-decoration-none text-dark hover-text-success d-block mb-1">Tupoksi</a></li>
          <li><a href="#" class="text-decoration-none text-dark hover-text-success d-block">Struktur Organisasi</a></li>
        </ul>
      </div>

      <!-- Kontak -->
      <div class="col-md-6 col-lg-4">
        <h6 class="fw-bold mb-3 border-bottom pb-2">📞 Hubungi Kami</h6>
        <ul class="list-unstyled small">
          <li><i class="fas fa-phone-alt me-2 text-success"></i>0812-6382-3912</li>
          <li><i class="fas fa-envelope me-2 text-success"></i>dlhbandung.com@gmail.com</li>
          <li><i class="fab fa-facebook me-2 text-success"></i>DLH Tanjung Pinang</li>
          <li><i class="fab fa-instagram me-2 text-success"></i>@dlh.tanjungpinang</li>
          <li><i class="fab fa-tiktok me-2 text-success"></i>@dlh.tanjungpinang</li>
        </ul>
      </div>

    </div>

    <hr class="my-4" style="border-color: rgba(0, 0, 0, 0.1);">

    <div class="text-center pb-3 small text-secondary">
      © 2025 Dinas Lingkungan Hidup Persampahan. Seluruh hak cipta dilindungi.
    </div>
  </div>
</footer>

<style>
  .hover-text-success:hover {
    color: #198754 !important;
  }
</style>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>