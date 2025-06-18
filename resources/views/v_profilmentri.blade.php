@extends('layout.v_visiii')

@section('content')
<section class="py-5" style="
  background-image: url('/assets/img/hh.jpg');
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  backdrop-filter: brightness(0.93);
  min-height: 100vh;
">
  <div class="container bg-white bg-opacity-75 p-4 rounded-4 shadow-lg">
    <h2 class="fw-bold text-dark mb-4 text-center">Profil Menteri Lingkungan Hidup</h2>

    <div class="row align-items-start">
      <!-- FOTO -->
      <div class="col-md-4 mb-4 mb-md-0 text-center">
        <img src="/assets/img/menteri.jpeg" alt="Foto Menteri" class="img-fluid rounded shadow" style="max-height: 400px;">
        <h5 class="fw-bold mt-3">Dr. Hanif Faisol Nurofiq S.Hut.M.P</h5>
        <p class="text-muted mb-0">Menteri Lingkungan Hidup dan Kehutanan RI</p>
      </div>

      <!-- BIOGRAFI -->
      <div class="col-md-8" style="line-height: 1.8; font-size: 1.05rem;">
        <p>
          Dr. Siti Nurbaya Bakar merupakan sosok penting dalam pembangunan berkelanjutan dan pengelolaan lingkungan di Indonesia. Dengan pengalaman panjang di birokrasi, beliau telah membawa berbagai transformasi dalam tata kelola lingkungan hidup dan kehutanan.
        </p>
        <p>
          Lahir di Jakarta, beliau menempuh pendidikan S1 di IPB, melanjutkan ke jenjang magister dan doktor di bidang lingkungan dan tata ruang. Sebelum menjabat sebagai menteri, beliau pernah menjadi Sekretaris Jenderal DPD RI serta menduduki berbagai posisi strategis di Kementerian.
        </p>
        <p>
          Dalam kepemimpinannya, beliau menekankan pentingnya kolaborasi antara pemerintah, masyarakat, dan pelaku usaha untuk menjaga keseimbangan antara ekonomi dan kelestarian lingkungan. Beberapa program unggulan yang dijalankan antara lain rehabilitasi hutan dan lahan, pengendalian perubahan iklim, serta penguatan sistem pengelolaan sampah nasional.
        </p>
        <p>
          Komitmen beliau terhadap pelestarian lingkungan menjadikan Indonesia semakin aktif dalam forum-forum internasional terkait perubahan iklim dan pembangunan berkelanjutan.
        </p>
      </div>
    </div>
  </div>
</section>
@endsection
