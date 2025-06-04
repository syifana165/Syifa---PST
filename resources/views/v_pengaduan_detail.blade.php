@extends('layout.v_template')

@section('title', 'Detail Pengaduan')

@section('content')
<div class="container">
    <h3 class="text-center mb-4" style="font-size: 2rem; font-weight: bold; color: #343a40;">Detail Pengaduan</h3>

    <table class="table table-bordered" style="font-size: 1.2rem; color: #495057;">
        <tr>
            <th style="background-color: #f8f9fa; width: 200px;">Nama</th>
            <td>{{ $pengaduan->Nama }}</td>
        </tr>
        <tr>
            <th style="background-color: #f8f9fa;">Alamat</th>
            <td>{{ $pengaduan->Alamat }}</td>
        </tr>
        <tr>
            <th style="background-color: #f8f9fa;">No HP</th>
            <td>{{ $pengaduan->No_HP }}</td>
        </tr>
        <tr>
            <th style="background-color: #f8f9fa;">Tanggal</th>
            <td>{{ $pengaduan->Tanggal }}</td>
        </tr>
        <tr>
            <th style="background-color: #f8f9fa;">Pengaduan</th>
            <td>{{ $pengaduan->Pengaduan }}</td>
        </tr>
        <tr>
            <th style="background-color: #f8f9fa;">Foto</th>
            <td>
                @if ($pengaduan->Foto_Pengaduan)
                    <img src="{{ asset('foto_pengaduan/' . $pengaduan->Foto_Pengaduan) }}" alt="Foto Pengaduan" style="max-width: 300px;" class="img-fluid rounded">
                @else
                    Tidak ada foto
                @endif
            </td>
        </tr>
    </table>

    <a href="{{ route('pengaduan.index') }}" class="btn btn-secondary" style="font-size: 1.1rem;">Kembali</a>
</div>
@endsection
