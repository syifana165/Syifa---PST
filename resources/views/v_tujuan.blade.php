@extends('layout.v_visiii')

@section('content')
<section class="py-5" style="
  background-image: url('/assets/img/hh.jpg');
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  backdrop-filter: brightness(0.95);
  min-height: 100vh;
  display: flex;
  align-items: flex-start;
">
  <div class="container">
    <h2 class="fw-bold text-dark mb-4">
      Tujuan
    </h2>

    <div class="mt-2">
      <div class="bg-white bg-opacity-75 p-4 shadow rounded-4" style="line-height: 1.8; font-size: 1.05rem;">
        <p class="mb-0 text-dark">
          Mendukung pembangunan berwawasan lingkungan demi masa depan yang lebih hijau dan berkelanjutan. 
          Tujuan ini diwujudkan melalui pelestarian alam, peningkatan kapasitas masyarakat dalam pengelolaan sampah, 
          serta kolaborasi antar lembaga dalam menjaga keseimbangan ekosistem dan kualitas lingkungan hidup.
        </p>
      </div>
    </div>
  </div>
</section>
@endsection
