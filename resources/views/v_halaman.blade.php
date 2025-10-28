<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Home</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('home/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('home/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('home/assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('home/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('home/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('home/assets/css/main.css') }}" rel="stylesheet">
</head>

<body class="index-page">
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">
      <a href="/" class="logo d-flex align-items-center me-auto">
        <h1 class="sitename">Santara Global</h1>
      </a>
      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="active">Home</a></li>
          <li class="dropdown">
            <a href="#"><span>Profil</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="#tentangkami">Tentang Kami</a></li>
              <li><a href="#visimisi">Visi & Misi</a></li>
              <li><a href="#sejarah">Sejarah</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="#dokumentasi"><span>Dokumentasi</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
          <ul>
            <li><a href="#foto">Foto</a></li>
            <li><a href="#video">Video</a></li>
            <li><a href="#dokumen">Dokumen</a></li>
          </ul>
        </li>
          <li><a href="#berita">Berita</a></li>
          <li><a href="#kontak">Kontak</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
      <a class="cta-btn" href="login">LOGIN</a>
    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">
      <img src="{{ asset('home/assets/img/hero-bg.jpg') }}" alt="" data-aos="fade-in">
      <div class="container d-flex flex-column align-items-center">
        <h2 data-aos="fade-up" data-aos-delay="100">Selamat Datang di Santara Global</h2>
        <div class="d-flex mt-4" data-aos="fade-up" data-aos-delay="300">
        </div>
      </div>
    </section>

 <!-- ========================== PROFIL: TENTANG KAMI ========================== -->
<section id="tentangkami" class="section py-5" style="background: linear-gradient(135deg, #f8f9ff 0%, #f2f4f7 100%);">
  <div class="container" data-aos="fade-up">
    <div class="section-title text-center mb-5">
      <h2 class="fw-bold text-dark mb-2">Tentang Kami</h2>
    </div>

    @php
      $tentangkami = $profil->where('tipe', 'tentang_kami');
    @endphp
    @forelse($tentangkami as $p)
    <div class="row align-items-center justify-content-center g-5">
      <div class="col-lg-5 text-center">
        @if($p->gambar)
        <img src="{{ asset('storage/'.$p->gambar) }}" 
             alt="Tentang Kami" 
             class="img-fluid rounded-4 shadow-lg" 
             style="max-height:350px; object-fit:cover;">
        @endif
      </div>
      <div class="col-lg-7">
        <div class="p-4 bg-white rounded-4 shadow-sm border-start border-4 border-primary">
          <p class="text-secondary fs-5" style="text-align: justify;">
            {!! nl2br(e($p->isi)) !!}
          </p>
        </div>
      </div>
    </div>
    @empty
      <div class="text-center text-muted fst-italic mt-4">Belum ada data Tentang Kami.</div>
    @endforelse
  </div>
</section>

<!-- ========================== PROFIL: VISI & MISI ========================== -->
<section id="visimisi" class="section py-5" style="background: #ffffff;">
  <div class="container" data-aos="fade-up">
    <div class="section-title text-center mb-5">
      <h2 class="fw-bold text-dark mb-2">Visi & Misi</h2>
    </div>

    @php
      $visimisi = $profil->where('tipe', 'visi_misi');
    @endphp
    @forelse($visimisi as $p)
    <div class="row align-items-center justify-content-center g-5 flex-lg-row-reverse">
      <div class="col-lg-5 text-center">
        @if($p->gambar)
        <img src="{{ asset('storage/'.$p->gambar) }}" 
             alt="Visi & Misi" 
             class="img-fluid rounded-4 shadow-lg" 
             style="max-height:350px; object-fit:cover;">
        @endif
      </div>
      <div class="col-lg-7">
        <div class="p-4 bg-light rounded-4 shadow-sm border-start border-4 border-info">
          <p class="text-secondary fs-5" style="text-align: justify;">
            {!! nl2br(e($p->isi)) !!}
          </p>
        </div>
      </div>
    </div>
    @empty
      <div class="text-center text-muted fst-italic mt-4">Belum ada data Visi & Misi.</div>
    @endforelse
  </div>
</section>

<!-- ========================== PROFIL: SEJARAH ========================== -->
<section id="sejarah" class="section py-5" style="background: linear-gradient(135deg, #f9f9f9 0%, #eef2f8 100%);">
  <div class="container" data-aos="fade-up">
    <div class="section-title text-center mb-5">
      <h2 class="fw-bold text-dark mb-2">Sejarah</h2>
    </div>

    @php
      $sejarah = $profil->where('tipe', 'sejarah');
    @endphp
    @forelse($sejarah as $p)
    <div class="row align-items-center justify-content-center g-5">
      <div class="col-lg-5 text-center">
        @if($p->gambar)
        <img src="{{ asset('storage/'.$p->gambar) }}" 
             alt="Sejarah" 
             class="img-fluid rounded-4 shadow-lg" 
             style="max-height:350px; object-fit:cover;">
        @endif
      </div>
      <div class="col-lg-7">
        <div class="p-4 bg-white rounded-4 shadow-sm border-start border-4 border-warning">
          <p class="text-secondary fs-5" style="text-align: justify;">
            {!! nl2br(e($p->isi)) !!}
          </p>
        </div>
      </div>
    </div>
    @empty
      <div class="text-center text-muted fst-italic mt-4">Belum ada data Sejarah.</div>
    @endforelse
  </div>
</section>


<!-- ======= Dokumentasi Section ======= -->
<section id="dokumentasi" class="section py-5" style="background: #f5f5f5; margin-top: 100px;">
  <div class="container">
    <!-- Judul Utama -->
    <div class="section-title text-center mb-5">
      <h2 class="fw-bold text-dark mb-2">Dokumentasi Kegiatan</h2>
    </div>

    <!-- FOTO -->
    <div id="foto" class="kategori mb-5">
      <div class="section-title text-center mb-4">
        <h2 class="fw-bold text-dark mb-2">Galeri Foto</h2>
      </div>
      <div class="row g-4 justify-content-center">
        @forelse($dokumen->where('tipe', 'foto') as $d)
        <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="card dokumen-card shadow-sm border-0 h-100">
            <div class="card-header p-0">
              <img src="{{ asset('storage/' . $d->file_dokumen) }}" alt="Foto {{ $d->nama_dokumen }}" class="card-img-top rounded-4">
            </div>
            <div class="card-body text-center">
              <h6 class="fw-semibold text-dark">{{ $d->nama_dokumen }}</h6>
              <small class="text-muted">
                <i class="bi bi-calendar"></i>
                {{ \Carbon\Carbon::parse($d->tanggal_upload)->format('d M Y') }}
              </small>
            </div>
            <div class="card-footer bg-transparent border-0">
              <a href="{{ asset('storage/' . $d->file_dokumen) }}" target="_blank" class="btn btn-sm btn-outline-danger w-100">
                <i class="bi bi-eye"></i> Lihat
              </a>
            </div>
          </div>
        </div>
        @empty
        <div class="col-12 text-center">
          <p class="text-muted fst-italic">Belum ada foto yang tersedia.</p>
        </div>
        @endforelse
      </div>
    </div>

    <!-- VIDEO -->
    <div id="video" class="kategori mb-5">
      <div class="section-title text-center mb-4">
        <h2 class="fw-bold text-dark mb-2">Dokumentasi Video</h2>
      </div>
      <div class="row g-4 justify-content-center">
        @forelse($dokumen->where('tipe', 'video') as $d)
        <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="card dokumen-card shadow-sm border-0 h-100">
            <div class="ratio ratio-4x3 rounded-4">
              @if(Str::contains($d->file_dokumen, 'youtube.com') || Str::contains($d->file_dokumen, 'youtu.be'))
                @php
                  $videoId = Str::afterLast($d->file_dokumen, '/');
                  if(Str::contains($videoId, 'watch?v=')) {
                    $videoId = Str::after($videoId, 'watch?v=');
                  }
                @endphp
                <iframe src="https://www.youtube.com/embed/{{ $videoId }}" frameborder="0" allowfullscreen class="rounded-4"></iframe>
              @else
                <video controls class="rounded-4">
                  <source src="{{ asset('storage/' . $d->file_dokumen) }}" type="video/mp4">
                </video>
              @endif
            </div>
            <div class="card-body text-center">
              <h6 class="fw-semibold text-dark">{{ $d->nama_dokumen }}</h6>
              <small class="text-muted">
                <i class="bi bi-calendar"></i>
                {{ \Carbon\Carbon::parse($d->tanggal_upload)->format('d M Y') }}
              </small>
            </div>
            <div class="card-footer bg-transparent border-0">
              <a href="{{ $d->file_dokumen }}" target="_blank" class="btn btn-sm btn-danger w-100">
                <i class="bi bi-play-circle"></i> Tonton Video
              </a>
            </div>
          </div>
        </div>
        @empty
        <div class="col-12 text-center">
          <p class="text-muted fst-italic">Belum ada video yang tersedia.</p>
        </div>
        @endforelse
      </div>
    </div>

    <!-- PDF -->
    <div id="dokumen-pdf" class="kategori mb-5">
      <div class="section-title text-center mb-4">
        <h2 class="fw-bold text-dark mb-2">Dokumen PDF</h2>
      </div>
      <div class="row g-4 justify-content-center">
        @forelse($dokumen->where('tipe', 'pdf') as $d)
        <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="card dokumen-card shadow-sm border-0 h-100">
            <div class="card-header p-0">
              <iframe src="{{ asset('storage/' . $d->file_dokumen) }}" class="rounded-4" style="height:220px;"></iframe>
            </div>
            <div class="card-body text-center">
              <h6 class="fw-semibold text-dark">{{ $d->nama_dokumen }}</h6>
              <small class="text-muted">
                <i class="bi bi-calendar"></i>
                {{ \Carbon\Carbon::parse($d->tanggal_upload)->format('d M Y') }}
              </small>
            </div>
            <div class="card-footer bg-transparent border-0">
              <a href="{{ asset('storage/' . $d->file_dokumen) }}" target="_blank" class="btn btn-sm btn-outline-danger w-100">
                <i class="bi bi-eye"></i> Lihat
              </a>
            </div>
          </div>
        </div>
        @empty
        <div class="col-12 text-center">
          <p class="text-muted fst-italic">Belum ada dokumen PDF yang tersedia.</p>
        </div>
        @endforelse
      </div>
    </div>

  </div>

  <!-- STYLE -->
  <style>
    .dokumen-card {
      background: #fff;
      border-radius: 12px;
      overflow: hidden;
      transition: all 0.3s ease-in-out;
    }
    .dokumen-card:hover {
      transform: translateY(-6px);
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    }
    .dokumen-card img,
    .dokumen-card video,
    .dokumen-card iframe {
      width: 100%;
      height: 220px;
      object-fit: cover;
      transition: transform 0.4s ease;
    }
    .dokumen-card:hover img,
    .dokumen-card:hover video,
    .dokumen-card:hover iframe {
      transform: scale(1.05);
    }
  </style>
</section>




  <!-- ========================== BERITA / ARTIKEL ========================== -->
<section id="berita" class="section py-5" style="background: #f9f9ff;">
  <div class="container" data-aos="fade-up">
    <div class="section-title text-center mb-5">
      <h2 class="fw-bold text-dark">Berita & Artikel</h2>
    </div>

    <div class="row g-4 justify-content-center">
      @forelse($artikel as $a)
      <div class="col-md-4">
        <div class="card dokumen-card shadow-sm border-0 h-100">
          @if($a->gambar)
          <img src="{{ asset('uploads/artikel/' . $a->gambar) }}" 
               class="card-img-top" 
               alt="{{ $a->judul }}" 
               style="height:200px; object-fit:cover;">
          @endif
          <div class="card-body">
            <h5 class="card-title">{{ $a->judul }}</h5>
            <p class="card-text text-muted">{{ Str::limit(strip_tags($a->isi), 100) }}</p>
          </div>
          <div class="card-footer bg-transparent border-0">
            <a href="{{ route('artikel.show', $a->id) }}" class="btn btn-sm btn-gradient">
              <i class="bi bi-eye"></i> Baca Selengkapnya
            </a>
          </div>
        </div>
      </div>
      @empty
      <div class="col-12 text-center">
        <p class="text-muted fst-italic">Belum ada artikel yang tersedia.</p>
      </div>
      @endforelse
    </div>
  </div>

  <!-- Style khusus artikel -->
  <style>
    .btn-gradient {
        background: linear-gradient(135deg, #8b5cf6, #6d28d9);
        color: #fff;
        font-weight: 600;
        border-radius: 12px;
        padding: 6px 14px;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }
    .btn-gradient:hover {
        background: linear-gradient(135deg, #a78bfa, #7c3aed);
        transform: scale(1.05);
        color: #fff;
    }
  </style>
</section>

<!-- Kontak Section -->
<section id="kontak" class="kontak section py-5" style="background: #f8f9fa;">
  <div class="container" data-aos="fade-up">
    <!-- Judul Section -->
    <div class="section-title text-center mb-5">
      <h2 style="font-weight:700; color:#1a1a1a;">Hubungi Kami</h2>
    </div>

    <div class="row justify-content-center align-items-center g-4">
      <!-- Maps -->
      <div class="col-md-6 mb-4">
        <div class="card shadow-sm border-0">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.1234567890!2d107.633456!3d-6.550123!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e698e0e1234567%3A0xabcdef1234567890!2sBlok%20Kaleng%20Banteng%2C%20Desa%20Cibogo%2C%20Subang!5e0!3m2!1sen!2sid!4v1698412345678!5m2!1sen!2sid"
            width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
          <div class="card-footer text-center bg-white">
            <a href="https://www.google.com/maps?q=Blok+Kaleng+Banteng+Desa+Cibogo,+Subang"
               target="_blank" class="btn btn-outline-primary btn-sm">Lihat di Maps</a>
          </div>
        </div>
      </div>

      <!-- WA & Email stacked -->
      <div class="col-md-3 mb-4 d-flex flex-column align-items-center justify-content-center">
        <!-- WA -->
        <a href="https://wa.me/6282315821126" target="_blank" class="text-decoration-none w-100 mb-3">
          <div class="card p-4 text-center shadow-sm hover-effect" style="background-color:#ffffff; color:#333;">
            <div class="icon mb-3">
              <i class="bi bi-whatsapp" style="font-size:2rem; color:#25D366;"></i>
            </div>
            <h5 style="color:#333;">Call Us</h5>
            <p class="mb-0">+62 823 1582 1126</p>
          </div>
        </a>

        <!-- Email -->
        <a href="mailto:syifanzwaa470@gmail.com" class="text-decoration-none w-100">
          <div class="card p-4 text-center shadow-sm hover-effect" style="background-color:#ffffff; color:#333;">
            <div class="icon mb-3">
              <i class="bi bi-envelope-fill" style="font-size:2rem; color:#FF4C4C;"></i>
            </div>
            <h5 style="color:#333;">Email Us</h5>
            <p class="mb-0">syifanzwaa470@gmail.com</p>
          </div>
        </a>
      </div>
    </div>
  </div>
</section>

<!-- Style Section -->
<style>
.section-title h2 {
  font-weight: 700; /* Membuat judul bold */
  color: #1a1a1a; /* Warna hitam gelap */
}

.hover-effect {
  transition: transform 0.3s, box-shadow 0.3s;
  cursor: pointer;
}

.hover-effect:hover {
  transform: translateY(-5px);
  box-shadow: 0 10px 20px rgba(0,0,0,0.15);
}
</style>


  <footer id="footer" class="footer dark-background">
    <div class="container copyright text-center mt-4">
      <p>© <strong class="px-1 sitename">Syifa</strong> All Rights Reserved</p>
    </div>
  </footer>

  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center">
    <i class="bi bi-arrow-up-short"></i>
  </a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('home/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('home/assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('home/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('home/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('home/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
  <script src="{{ asset('home/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>

  <!-- Main JS File -->
  <script src="{{ asset('home/assets/js/main.js') }}"></script>

  
</body>
</html>
