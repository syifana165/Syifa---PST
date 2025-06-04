@extends('layout.v_template')

@section('title', 'Edit Data Penanggung Jawab')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Edit Data Penanggung Jawab</h2>

    <form action="{{ route('pj.update', $pj->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label><strong>Nama</strong></label>
            <input type="text" name="Nama" class="form-control" value="{{ $pj->Nama }}" required>
        </div>

        <div class="form-group mb-3">
            <label><strong>No HP</strong></label>
            <input type="text" name="No_HP" class="form-control" value="{{ $pj->No_HP }}" required>
        </div>

        <div class="form-group mb-3">
            <label><strong>Alamat</strong></label>
            <input type="text" name="Alamat" class="form-control" value="{{ $pj->Alamat }}" required>
        </div>

        <div class="form-group mb-3">
            <label><strong>TPS</strong></label>
            <input type="text" name="TPS" class="form-control" value="{{ $pj->TPS }}" required>
        </div>

        <div class="form-group mb-3">
            <label><strong>Keterangan</strong></label>
            <input type="text" name="Keterangan" class="form-control" value="{{ $pj->Keterangan }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('pj.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
