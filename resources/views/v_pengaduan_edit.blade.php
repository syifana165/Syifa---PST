@extends('layout.v_template')

@section('title', 'Edit Pengaduan')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Edit Pengaduan</h2>
    
    <form action="{{ route('pengaduan.update', $data->id_pengaduan) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        
        <div class="form-group mb-3">
            <label><strong>Nama</strong></label>
            <input type="text" name="Nama" class="form-control" value="{{ $data->Nama }}" required>
        </div>

        <div class="form-group mb-3">
            <label><strong>Alamat</strong></label>
            <input type="text" name="Alamat" class="form-control" value="{{ $data->Alamat }}" required>
        </div>

        <div class="form-group mb-3">
            <label><strong>No HP</strong></label>
            <input type="text" name="No_HP" class="form-control" value="{{ $data->No_HP }}" required>
        </div>
        
        <div class="form-group mb-3">
        <label><strong>Tanggal</strong></label>
        <input type="date" name="Tanggal" class="form-control" value="{{ $data->Tanggal }}" required>
        </div>

        <div class="form-group mb-3">
            <label><strong>Pengaduan</strong></label>
            <textarea name="Pengaduan" class="form-control" rows="3" required>{{ $data->Pengaduan }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label><strong>Foto</strong></label><br>
            @if ($data->Foto_Pengaduan)
                <img src="{{ asset('foto_pengaduan/' . $data->Foto_Pengaduan) }}" alt="Foto" width="150" class="mb-2">
            @endif
            <input type="file" name="Foto_Pengaduan" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('pengaduan') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
