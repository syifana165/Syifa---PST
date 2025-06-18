@extends('layout.v_template')

@section('title', 'Dashboard Pengaduan')

@section('content')
<div class="container-fluid py-4">

    {{-- **Dark/Light Mode Toggle** --}}
    <div class="d-flex justify-content-end mb-3">
        <button id="toggle-theme" class="btn btn-outline-dark btn-sm">
            <i class="fas fa-moon"></i> Mode Gelap
        </button>
    </div>

    {{-- Statistik --}}
    <div class="row mb-4 g-4">
        <!-- Total Pengaduan -->
        <div class="col-md-6">
            <div class="card bg-primary text-white shadow-lg border-0 rounded-4">
                <div class="card-body d-flex align-items-center">
                    <div class="me-3"><i class="fas fa-file-alt fa-3x"></i></div>
                    <div>
                        <h5 class="card-title mb-1 fw-bold">Total Pengaduan</h5>
                        <h3 class="display-6">{{ $totalPengaduan ?? 0 }}</h3>
                        <small class="text-white-50">Seluruh pengaduan masuk</small>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pengaduan Selesai -->
        <div class="col-md-6">
            <div class="card bg-success text-white shadow-lg border-0 rounded-4">
                <div class="card-body d-flex align-items-center">
                    <div class="me-3"><i class="fas fa-check-circle fa-3x"></i></div>
                    <div>
                        <h5 class="card-title mb-1 fw-bold">Pengaduan Selesai</h5>
                        <h3 class="display-6">{{ $pengaduanSelesai ?? 0 }}</h3>
                        <small class="text-white-50">Telah ditindaklanjuti</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Data Tabel --}}
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-header bg-gradient bg-primary text-white d-flex justify-content-between align-items-center rounded-top-4">
            <h3 class="m-0 fw-bold">Data Pengaduan</h3>
            <form action="{{ route('pengaduan.index') }}" method="GET" class="d-flex" style="width:350px">
                <input type="text" name="search" class="form-control form-control-sm rounded-start" placeholder="Cari Nama…" value="{{ request('search') }}">
                <button class="btn btn-sm btn-light rounded-0"><i class="fas fa-search"></i></button>
                @if(request('search'))
                <a href="{{ route('pengaduan.index') }}" class="btn btn-sm btn-secondary rounded-end"><i class="fas fa-times"></i></a>
                @endif
            </form>
        </div>
        <div class="card-body p-0 bg-light rounded-bottom-4">
            @if(session('success'))
                <div class="alert alert-success m-3">{{ session('success') }}</div>
            @endif

            <div class="table-responsive" id="print-area">
                <table class="table table-hover table-bordered mb-0 text-center align-middle bg-white shadow-sm rounded">
                    <thead class="table-primary text-uppercase">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No HP</th>
                            <th>Tanggal</th>
                            <th>Pengaduan</th>
                            <th>Foto</th>
                            <th>Status</th>
                            <th class="no-print">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pengaduan as $key => $data)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td class="text-start">{{ $data->Nama }}</td>
                            <td class="text-start">{{ $data->Alamat }}</td>
                            <td class="text-start">{{ $data->No_HP }}</td>
                            <td>{{ \Carbon\Carbon::parse($data->Tanggal)->translatedFormat('d M Y') }}</td>
                            <td class="text-start">{{ Str::limit($data->Pengaduan,80) }}</td>
                            <td>
                                @if($data->Foto_Pengaduan)
                                    <img src="{{ asset('foto_pengaduan/'.$data->Foto_Pengaduan) }}" class="img-thumbnail" style="width:70px;height:70px;object-fit:cover;">
                                @else
                                    <span class="text-muted">Tidak ada</span>
                                @endif
                            </td>
                            <td>
                                @php
                                    $badge = match($data->status) {
                                        'Selesai' => 'bg-success',
                                        'Sedang Proses' => 'bg-info',
                                        'Pengaduan' => 'bg-warning text-dark',
                                        default => 'bg-secondary'
                                    };
                                @endphp
                                <span class="badge {{ $badge }} px-3 py-2 rounded-pill">{{ $data->status }}</span>
                            </td>
                            <td class="no-print">
                                <a href="{{ route('pengaduan.detail',$data->id_pengaduan) }}" class="btn btn-info btn-sm"><i class="fas fa-info-circle"></i></a>

                                @if(auth()->user()->level == 2)
                                <form action="{{ route('pengaduan.ubahStatus',$data->id_pengaduan) }}" method="POST" class="mt-1">
                                    @csrf
                                    <select name="status" onchange="this.form.submit()" class="form-select form-select-sm">
                                        <option value="Pengaduan" {{ $data->status=='Pengaduan'? 'selected':'' }}>Pengaduan</option>
                                        <option value="Sedang Proses" {{ $data->status=='Sedang Proses'? 'selected':'' }}>Sedang Proses</option>
                                        <option value="Selesai" {{ $data->status=='Selesai'? 'selected':'' }}>Selesai</option>
                                    </select>
                                </form>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="9">Data pengaduan tidak ditemukan.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-end mt-3 p-3 no-print">
                <button onclick="window.print()" class="btn btn-outline-primary btn-sm"><i class="fas fa-print"></i> Print</button>
            </div>
        </div>
    </div>
</div>

{{-- CSS Dark Mode --}}
<style>
.dark-mode {background:#121212; color:#f1f1f1}
.dark-mode .card, .dark-mode .badge, .dark-mode .table {background:#1e1e1e !important; color:#fff; border-color:#333}
.dark-mode .table-primary {background:#343a40 !important}
.dark-mode .btn-outline-dark {border-color:#f1f1f1; color:#f1f1f1}
</style>

{{-- JS Toggle Mode --}}
<script>
document.addEventListener('DOMContentLoaded', () => {
    const btn = document.getElementById('toggle-theme');
    const icon = btn.querySelector('i');
    const darkStored = localStorage.getItem('theme') === 'dark';

    const applyMode = (dark) => {
        document.body.classList.toggle('dark-mode', dark);
        btn.classList.toggle('btn-outline-light', dark);
        btn.classList.toggle('btn-outline-dark', !dark);
        icon.classList.toggle('fa-sun', dark);
        icon.classList.toggle('fa-moon', !dark);
        btn.innerHTML = `<i class="fas ${dark? 'fa-sun':'fa-moon'}"></i> Mode ${dark? 'Terang':'Gelap'}`;
        localStorage.setItem('theme', dark ? 'dark':'light');
    };

    applyMode(darkStored);
    btn.addEventListener('click', () => applyMode(!document.body.classList.contains('dark-mode')));
});
</script>
@endsection
