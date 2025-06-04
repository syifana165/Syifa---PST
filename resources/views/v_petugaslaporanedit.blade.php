@extends('layout.v_template')

@section('title', 'Edit Laporan Petugas')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Edit Laporan Petugas</h2>

    <form action="{{ route('laporan.update', $laporan->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label><strong>Nama</strong></label>
            <input type="text" name="nama" class="form-control" value="{{ $laporan->nama }}" required>
        </div>

        <div class="form-group mb-3">
            <label><strong>No HP</strong></label>
            <input type="text" name="no_hp" class="form-control" value="{{ $laporan->no_hp }}" required>
        </div>

        <div class="form-group mb-3">
            <label><strong>Alamat</strong></label>
            <input type="text" name="alamat" class="form-control" value="{{ $laporan->alamat }}" required>
        </div>

        <div class="form-group mb-3">
            <label><strong>Tanggal</strong></label>
            <input type="date" name="tanggal" class="form-control" value="{{ $laporan->tanggal }}" required>
        </div>

        <div class="form-group mb-3">
            <label><strong>Lokasi Tugas</strong></label>
            <input type="text" name="lokasi_tugas" class="form-control" value="{{ $laporan->lokasi_tugas }}" required>
        </div>

        <div class="form-group mb-3">
            <label><strong>Status Tugas</strong></label>
            <select name="status_tugas" class="form-control" required>
                <option value="Selesai" {{ $laporan->status_tugas == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                <option value="Belum Selesai" {{ $laporan->status_tugas == 'Belum Selesai' ? 'selected' : '' }}>Belum Selesai</option>
            </select>
        </div>

        <div class="form-group mb-3">
            <label><strong>Deskripsi Tugas</strong></label>
            <textarea name="deskripsi_tugas" class="form-control" rows="3" required>{{ $laporan->deskripsi_tugas }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('laporan.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
