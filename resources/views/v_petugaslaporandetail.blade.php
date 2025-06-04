@extends('layout.v_template')

@section('title', 'Detail Laporan')

@section('content')
<div class="container">
    <h3 class="text-center mb-4" style="font-size: 2rem; font-weight: bold; color: #343a40;">Detail Laporan</h3>

    <table class="table table-bordered" style="font-size: 1.2rem; color: #495057;">
        <tr><th style="background-color: #f8f9fa; width: 200px;">Nama</th><td>{{ $laporan->nama }}</td></tr>
        <tr><th style="background-color: #f8f9fa;">No HP</th><td>{{ $laporan->no_hp }}</td></tr>
        <tr><th style="background-color: #f8f9fa;">Alamat</th><td>{{ $laporan->alamat }}</td></tr>
        <tr><th style="background-color: #f8f9fa;">Tanggal</th><td>{{ $laporan->tanggal }}</td></tr>
        <tr><th style="background-color: #f8f9fa;">Lokasi</th><td>{{ $laporan->lokasi_tugas }}</td></tr>
        <tr><th style="background-color: #f8f9fa;">Status</th><td>{{ $laporan->status_tugas }}</td></tr>
        <tr><th style="background-color: #f8f9fa;">Deskripsi</th><td>{{ $laporan->deskripsi_tugas }}</td></tr>
    </table>

    <a href="{{ route('laporan.index') }}" class="btn btn-secondary" style="font-size: 1.1rem; padding: 10px 20px;">Kembali</a>
</div>
@endsection
