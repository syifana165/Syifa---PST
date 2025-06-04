@section('title')
Penanggung Jawab
@endsection

@extends('layout/v_template')

@section('page')
Tambah Data Penanggung Jawab
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Form Add</h3>
                </div>
                <form action="/pj/insert" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="Nama" class="form-control" placeholder="Masukkan Nama" value="{{ old('Nama') }}">
                            <div class="text-danger">@error('Nama') {{ $message }} @enderror</div>
                        </div>

                        <div class="form-group">
                            <label>Jabatan</label>
                            <input type="text" name="Jabatan" class="form-control" placeholder="Masukkan Jabatan" value="{{ old('Jabatan') }}">
                            <div class="text-danger">@error('Jabatan') {{ $message }} @enderror</div>
                        </div>

                        <div class="form-group">
                            <label>No HP</label>
                            <input type="text" name="No_HP" class="form-control" placeholder="Masukkan No HP" value="{{ old('No_HP') }}">
                            <div class="text-danger">@error('No_HP') {{ $message }} @enderror</div>
                        </div>

                        <div class="form-group">
                            <label>Foto</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="Foto" class="custom-file-input">
                                    <label class="custom-file-label">Pilih file</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                            </div>
                            <div class="text-danger">@error('Foto') {{ $message }} @enderror</div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Insert</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
