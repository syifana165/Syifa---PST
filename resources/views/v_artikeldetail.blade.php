<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $artikel->judul }}</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body {
      background-color: #f9f9f9;
      font-family: "Poppins", sans-serif;
    }
    #detail-artikel h2 {
      border-bottom: 3px solid #ff5828;
      display: inline-block;
      padding-bottom: 6px;
    }
    #detail-artikel .card {
      background: #fff;
      border-radius: 12px;
    }
    #detail-artikel a.btn {
      background-color: #ff5828;
      color: #fff;
      border: none;
      transition: 0.3s;
    }
    #detail-artikel a.btn:hover {
      background-color: #ff784e;
      color: #fff;
    }
  </style>
</head>

<body>
  <section id="detail-artikel" class="py-5">
    <div class="container">
      <div class="card border-0 shadow-sm mx-auto" style="max-width: 900px;">
        <div class="card-body p-4">

          <!-- Judul Artikel -->
          <h2 class="fw-bold text-dark mb-3 text-center">{{ $artikel->judul }}</h2>

          <!-- Info Tambahan -->
          <p class="text-muted text-center mb-4">
            <i class="bi bi-calendar3"></i>
            Dipublikasikan pada {{ $artikel->tanggal_upload }}
          </p>

          <!-- Gambar Artikel -->
          @if($artikel->gambar && Storage::disk('public')->exists($artikel->gambar))
            <div class="text-center mb-4">
              <img src="{{ asset('storage/' . $artikel->gambar) }}" 
                  class="img-fluid rounded" 
                  alt="{{ $artikel->judul }}" 
                  style="max-height: 450px; object-fit: cover;">
            </div>
          @else
            <div class="text-center mb-4">
              <img src="{{ asset('images/no-image.png') }}" 
                  class="img-fluid rounded" 
                  alt="Tidak ada gambar" 
                  style="max-height: 450px; object-fit: cover;">
            </div>
          @endif


          <!-- Isi Artikel -->
          <div class="artikel-isi" style="font-size: 1rem; color: #333; line-height: 1.7; text-align: justify;">
            {!! nl2br(e($artikel->isi)) !!}
          </div>

          <!-- Tombol Kembali -->
          <div class="text-center mt-5">
            <a href="/" class="btn text-white" style="background-color: #ff5828;">
                <i class="bi bi-arrow-left-circle"></i> Kembali ke Beranda
            </a>
          </div>

        </div>
      </div>
    </div>
  </section>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
