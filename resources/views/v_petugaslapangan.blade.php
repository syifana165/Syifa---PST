@extends('layout.v_public')

@section('title', 'Data Penugasan')

@section('content')
<h2 class="mb-4">Data Penugasan</h2>

<table class="table table-bordered bg-white shadow-sm">
    <thead class="table-light">
        <tr>
            <th>Nama</th>
            <th>Tanggal</th>
            <th>Lokasi</th>
            <th>Kelompok Petugas</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @forelse($data as $d)
        <tr>
            <td>{{ $d->pengaduan->Nama ?? '-' }}</td>
            <td>{{ isset($d->pengaduan->Tanggal) ? \Carbon\Carbon::parse($d->pengaduan->Tanggal)->format('d-m-Y') : '-' }}</td>
            <td>{{ $d->pengaduan->Alamat ?? '-' }}</td>
            <td>{{ $d->petugas->keterangan ?? '-' }}</td>
            <td>{{ $d->pengaduan->status ?? '-' }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="5" class="text-center">Data penugasan tidak ditemukan.</td>
        </tr>
        @endforelse
    </tbody>
</table>
<!-- Tombol Tambah Penugasan -->
<a href="{{ route('laporan.create') }}" class="btn btn-primary mt-3">+ Laporan Penugasan</a>

<!-- Tombol kembali -->
<a href="{{ route('v_halaman') }}" class="btn btn-secondary mt-3">← Kembali</a>
@endsection
