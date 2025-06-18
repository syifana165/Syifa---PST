@extends('layout.v_visiii')

@section('content')
<section class="py-5" style="
  background-image: url('/assets/img/hh.jpg');
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  backdrop-filter: brightness(0.95);
">
  <div class="container">
    <h2 class="fw-bold text-white mb-4" style="border-left: 5px solid orange; padding-left: 12px;">
      Visi & Misi
    </h2>
    
    <div class="bg-white bg-opacity-75 p-4 shadow rounded-4" style="line-height: 1.8; font-size: 1.05rem;">
      <h4 class="fw-bold text-primary">Visi</h4>
      <p>
        Terwujudnya lingkungan hidup yang sehat, bersih, dan berkelanjutan bagi generasi masa depan. 
        Visi ini mencerminkan komitmen untuk menciptakan tata kelola lingkungan yang mampu menjawab tantangan zaman, baik dari sisi pembangunan, kebutuhan masyarakat, maupun pelestarian alam secara menyeluruh.
      </p>

      <hr class="my-4" />

      <h4 class="fw-bold text-primary">Misi</h4>
      <ul style="padding-left: 20px;">
        <li>Meningkatkan kesadaran masyarakat tentang pentingnya pelestarian lingkungan melalui edukasi dan partisipasi aktif.</li>
        <li>Mendorong inovasi dalam pengelolaan sampah dan limbah berbasis teknologi ramah lingkungan.</li>
        <li>Memperkuat pengawasan dan penegakan hukum di bidang lingkungan hidup secara adil dan transparan.</li>
        <li>Menjalin kerja sama strategis dengan berbagai pihak dalam upaya menjaga keberlanjutan ekosistem.</li>
      </ul>
    </div>
  </div>
</section>
@endsection
