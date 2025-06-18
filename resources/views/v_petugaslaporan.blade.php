@extends('layout.v_template')

@section('title', 'Dashboard Laporan Petugas')

@section('content')
<div class="container-fluid py-4">
    <div class="card shadow border-0">
        <div class="card-header py-3 bg-danger text-white d-flex justify-content-between align-items-center">
            <h3 class="card-title m-0">Data Laporan Petugas</h3>
            <form action="{{ route('laporan.index') }}" method="GET" class="d-flex" style="width: 350px;">
                <input type="text" name="search" class="form-control form-control-sm" placeholder="Cari Nama..." value="{{ request('search') }}">
                <button type="submit" class="btn btn-sm btn-light ms-2">
                    <i class="fas fa-search"></i>
                </button>
                @if(request('search'))
                <a href="{{ route('laporan.index') }}" class="btn btn-sm btn-secondary ms-2">
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
                    <thead class="bg-danger text-white">
                        <tr>
                            <th>No</th>
                            <th class="text-start">Nama Petugas</th>
                            <th class="text-start">No HP</th>
                            <th style="min-width: 110px;">Tanggal</th>
                            <th class="text-start">Lokasi Tugas</th>
                            <th class="text-start">Deskripsi Tugas</th>
                            <th>Foto Bukti</th>
                            <th class="no-print" style="width: 100px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($laporan as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td class="text-start">{{ $item->nama }}</td>
                            <td class="text-start">{{ $item->no_hp }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d M Y') }}</td>
                            <td class="text-start">{{ $item->lokasi_tugas }}</td>
                            <td class="text-start" style="max-width: 250px; white-space: normal;">
                                {{ \Illuminate\Support\Str::limit($item->deskripsi_tugas, 80) }}
                            </td>
                            <td>
                                @if ($item->upload_foto)
                                    <a href="{{ asset('Foto_Laporan/' . $item->upload_foto) }}" target="_blank" title="Lihat Foto Bukti">
                                        <img src="{{ asset('Foto_Laporan/' . $item->upload_foto) }}" alt="Foto Bukti" style="max-width: 80px; max-height: 80px; border-radius: 4px;">
                                    </a>
                                @else
                                    <span class="text-muted">Tidak ada foto</span>
                                @endif
                            </td>
                            <td class="no-print">
                                <a href="{{ route('laporan.detail', $item->id_laporanpetugas) }}" class="btn btn-info btn-sm" title="Detail">
                                    <i class="fas fa-info-circle"></i>
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted py-4">Data laporan tidak ditemukan.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-end mt-3 p-3 no-print">
                <button onclick="window.print()" class="btn btn-outline-danger btn-sm">
                    <i class="fas fa-print me-1"></i> Print
                </button>
            </div>
        </div>
    </div>
</div>

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
