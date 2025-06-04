@extends('layout.v_template')

@section('title')
    Petugas Lapangan
@endsection

@section('page')
    Tambah Data Petugas Lapangan
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Form Tambah Petugas</h3>
                </div>

                <form action="{{ url('/petugas/insert') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        {{-- Nama --}}
                        <div class="form-group">
                            <label for="Nama">Nama</label>
                            <input type="text" name="Nama" class="form-control" id="Nama" placeholder="Masukkan Nama" value="{{ old('Nama') }}">
                            @error('Nama')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Wilayah Tugas --}}
                        <div class="form-group">
                            <label for="Wilayah_Tugas">Wilayah Tugas</label>
                            <input type="text" name="Wilayah_Tugas" class="form-control" id="Wilayah_Tugas" placeholder="Masukkan Wilayah Tugas" value="{{ old('Wilayah_Tugas') }}">
                            @error('Wilayah_Tugas')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- No HP --}}
                        <div class="form-group">
                            <label for="No_HP">No HP</label>
                            <input type="text" name="No_HP" class="form-control" id="No_HP" placeholder="Masukkan No HP" value="{{ old('No_HP') }}">
                            @error('No_HP')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Foto --}}
                        <div class="form-group">
                            <label for="Foto">Foto</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="Foto" class="custom-file-input" id="Foto">
                                    <label class="custom-file-label" for="Foto">Pilih file</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                            </div>
                            @error('Foto')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">Simpan</button>
                        <a href="{{ route('petugas.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
