@extends('layout.v_public')

@section('title', 'Data Penugasan')

@section('content')
<h2 class="mb-4">Data Laporan Penugasan</h2>

<table class="table table-bordered bg-white shadow-sm">
    <thead class="table-light">
        <tr>
            <th>Nama Pengadu</th>
            <th>Nama Petugas</th>
            <th>Tanggal Penugasan</th>
            <th>Lokasi Penugasan</th>
            <th>Kelompok Petugas</th>
            <th>Status</th>
            <th>Aksi</th> {{-- Kolom aksi --}}
        </tr>
    </thead>
    <tbody>
        @forelse($data as $d)
        <tr>
            <td>{{ $d->pengaduan->Nama ?? '-' }}</td>
            <td>{{ $d->petugas->Nama ?? '-' }}</td>
            <td>{{ isset($d->pengaduan->Tanggal) ? \Carbon\Carbon::parse($d->pengaduan->Tanggal)->format('d-m-Y') : '-' }}</td>
            <td>{{ $d->pengaduan->Alamat ?? '-' }}</td>
            <td>{{ $d->petugas->keterangan ?? '-' }}</td>
            <td>{{ $d->pengaduan->status ?? '-' }}</td>
            <td>
            <a href="{{ route('laporan.create', $d->id_penugasan) }}" class="btn btn-sm btn-primary">+ Laporan</a>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6" class="text-center">Data penugasan tidak ditemukan.</td>
        </tr>
        @endforelse
    </tbody>
</table>

<!-- Tombol kembali -->
<a href="{{ route('v_halaman') }}" class="btn btn-secondary mt-3">← Kembali</a>
@endsection
