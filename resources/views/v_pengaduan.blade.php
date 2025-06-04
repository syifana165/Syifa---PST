@extends('layout.v_template')

@section('title', 'Dashboard Pengaduan')

@section('content')
<div class="container-fluid py-4">

    <!-- Statistik Singkat -->
    <div class="row mb-4">
        <!-- Card Total Pengaduan (Kiri) -->
        <div class="col-md-6 d-flex justify-content-start">
            <div class="card shadow-sm border-0 text-white bg-primary" style="width: 320px; min-width: 280px;">
                <div class="card-body d-flex align-items-center">
                    <div class="me-3">
                        <i class="fas fa-file-alt fa-3x"></i>
                    </div>
                    <div>
                        <h5 class="card-title mb-1">Total Pengaduan</h5>
                        <h3 class="card-text">{{ $totalPengaduan ?? 0 }}</h3>
                        <small class="text-white-50">Seluruh pengaduan masuk</small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card Pengaduan Selesai (Kanan) -->
        <div class="col-md-6 d-flex justify-content-end">
            <div class="card shadow-sm border-0 text-white bg-success" style="width: 320px; min-width: 280px;">
                <div class="card-body d-flex align-items-center">
                    <div class="me-3">
                        <i class="fas fa-check-circle fa-3x"></i>
                    </div>
                    <div>
                        <h5 class="card-title mb-1">Pengaduan Selesai</h5>
                        <h3 class="card-text">{{ $pengaduanSelesai ?? 0 }}</h3>
                        <small class="text-white-50">Pengaduan yang telah ditindaklanjuti</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabel Pengaduan -->
    <div class="card shadow border-0">
        <div class="card-header py-3 bg-primary text-white d-flex justify-content-between align-items-center">
            <h3 class="card-title m-0">Data Pengaduan</h3>
            <form action="{{ route('pengaduan.index') }}" method="GET" class="d-flex" style="width: 350px;">
                <input type="text" name="search" class="form-control form-control-sm" placeholder="Cari Nama..." value="{{ request('search') }}">
                <button type="submit" class="btn btn-sm btn-light ms-2">
                    <i class="fas fa-search"></i>
                </button>
                @if(request('search'))
                <a href="{{ route('pengaduan.index') }}" class="btn btn-sm btn-secondary ms-2">
                    <i class="fas fa-times"></i>
                </a>
                @endif
            </form>
        </div>

        <div class="card-body p-0">
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
                <strong>Success!</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <div class="table-responsive" id="print-area">
                <table class="table table-hover table-bordered mb-0 text-center align-middle">
                    <thead class="table-primary text-primary">
                        <tr>
                            <th>No</th>
                            <th class="text-start">Nama</th>
                            <th class="text-start">Alamat</th>
                            <th class="text-start">No HP</th>
                            <th style="min-width: 110px;">Tanggal</th>
                            <th class="text-start">Pengaduan</th>
                            <th>Foto</th>
                            <th>Status</th>
                            <th class="no-print" style="width: 120px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pengaduan as $key => $data)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td class="text-start">{{ $data->Nama }}</td>
                            <td class="text-start">{{ $data->Alamat }}</td>
                            <td class="text-start">{{ $data->No_HP }}</td>
                            <td>{{ \Carbon\Carbon::parse($data->Tanggal)->translatedFormat('d M Y') }}</td>
                            <td class="text-start" style="max-width: 250px; white-space: normal;">
                                {{ Str::limit($data->Pengaduan, 80) }}
                            </td>
                            <td>
                                @if($data->Foto_Pengaduan)
                                <img src="{{ asset('foto_pengaduan/' . $data->Foto_Pengaduan) }}" alt="Foto Pengaduan" class="img-thumbnail" style="width: 70px; height: 70px; object-fit: cover;">
                                @else
                                <span class="text-muted">Tidak ada</span>
                                @endif
                            </td>
                            <td>
                                @php
                                    $badgeClass = match($data->status) {
                                        'Selesai' => 'bg-success',
                                        'Sedang Proses' => 'bg-info',
                                        'Pengaduan' => 'bg-warning text-dark',
                                        default => 'bg-secondary'
                                    };
                                @endphp
                                <span class="badge {{ $badgeClass }}">{{ $data->status }}</span>
                            </td>
                            <td class="no-print">
                                <a href="{{ route('pengaduan.detail', $data->id_pengaduan) }}" class="btn btn-info btn-sm mb-1" title="Detail">
                                    <i class="fas fa-info-circle"></i>
                                </a>
                                <!-- Dropdown ubah status -->
                                <form action="{{ route('pengaduan.ubahStatus', $data->id_pengaduan) }}" method="POST">
                                    @csrf
                                    <select name="status" onchange="this.form.submit()" class="form-select form-select-sm">
                                        <option value="Pengaduan" {{ $data->status == 'Pengaduan' ? 'selected' : '' }}>Pengaduan</option>
                                        <option value="Sedang Proses" {{ $data->status == 'Sedang Proses' ? 'selected' : '' }}>Sedang Proses</option>
                                        <option value="Selesai" {{ $data->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                                    </select>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9" class="text-center text-muted py-4">Data pengaduan tidak ditemukan.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Tombol Print -->
            <div class="d-flex justify-content-end mt-3 p-3 no-print">
                <button onclick="window.print()" class="btn btn-outline-primary btn-sm">
                    <i class="fas fa-print me-1"></i> Print
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Style untuk Print -->
<style media="print">
    body * {
        visibility: hidden;
    }

    #print-area, #print-area * {
        visibility: visible;
    }

    #print-area {
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
    }

    .no-print {
        display: none !important;
    }
</style>
@endsection
