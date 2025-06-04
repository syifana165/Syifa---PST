@extends('layout.v_template')

@section('title', 'Detail Petugas')

@section('content')
<div class="container">
    <h3 class="text-center mb-4" style="font-size: 2rem; font-weight: bold; color: #343a40;">Detail Petugas</h3>

    <table class="table table-bordered" style="font-size: 1.2rem; color: #495057;">
        <tr><th style="background-color: #f8f9fa; width: 200px;">Nama</th><td>{{ $petugas->Nama }}</td></tr>
        <tr><th style="background-color: #f8f9fa;">No HP</th><td>{{ $petugas->No_HP }}</td></tr>
        <tr><th style="background-color: #f8f9fa;">Alamat</th><td>{{ $petugas->Alamat }}</td></tr>
        <tr><th style="background-color: #f8f9fa;">Keterangan</th><td>{{ $petugas->keterangan }}</td></tr>
    </table>

    <a href="{{ route('petugas.index') }}" class="btn btn-secondary" style="font-size: 1.1rem;">Kembali</a>
</div>
@endsection
