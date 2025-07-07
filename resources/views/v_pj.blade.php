@extends('layout.v_template')

@section('title', 'Dashboard Penanggung Jawab')

@section('content')

<style media="print">
    body * {
        visibility: hidden;
    }

    #print-area, #print-area * {
        visibility: visible;
    }

    #print-area {
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
    }

    .no-print {
        display: none !important;
    }
</style>

<div class="container-fluid">

    <!-- Statistik (opsional) -->
    <div class="row mb-4 no-print">
        <div class="col-md-4">
            <div class="card text-white shadow" style="background-color: #0a1d44;">
                <!-- Statistik placeholder -->
            </div>
        </div>
    </div>

    <!-- Tabel Data -->
    <div class="card shadow mb-4" style="background-color: #f8f9fc;">
        <div class="card-header py-3 no-print" style="background-color: #0a1d44;">
            <div class="d-flex justify-content-between align-items-center flex-wrap">
                <h3 class="card-title text-white m-0">Data Penanggung Jawab</h3>

                <!-- Form Pencarian -->
                <form action="{{ route('pj.index') }}" method="GET" class="form-inline float-right mt-2" style="max-width: 350px;">
                    <div class="input-group input-group-sm">
                        <input type="text" name="search" class="form-control" placeholder="Cari Nama..." value="{{ request('search') }}" autocomplete="off">
                        <div class="input-group-append">
                            <button class="btn btn-light" type="submit" title="Cari">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                            @if(request('search'))
                            <a href="{{ route('pj.index') }}" class="btn btn-danger" title="Reset">
                                <i class="fas fa-times fa-sm"></i>
                            </a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="card-body">

            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show no-print" role="alert">
                <strong>Success!</strong> {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span>&times;</span></button>
            </div>
            @endif

            <!-- Tabel -->
            <div id="print-area" class="table-responsive">
                <table class="table table-bordered text-center">
                    <thead style="background-color: #0a1d44; color: white;">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>No HP</th>
                            <th>Alamat</th>
                            <th>TPS</th>
                            <th>Keterangan</th>
                            <th class="no-print">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataPJ as $key => $data)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td class="text-left">{{ $data->Nama }}</td>
                            <td class="text-left">{{ $data->No_HP }}</td>
                            <td class="text-left">{{ $data->Alamat }}</td>
                            <td class="text-left">{{ $data->TPS }}</td>
                            <td class="text-left">{{ $data->Keterangan }}</td>
                            <td class="no-print">
                                <div class="d-flex justify-content-center">
                                    <a href="{{ route('pj.detail', ['id' => $data->id]) }}" class="btn btn-info btn-sm mx-1" title="Detail">
                                        <i class="fas fa-info-circle"></i>
                                    </a>
                                    <a href="{{ route('pj.edit', ['id' => $data->id]) }}" class="btn btn-warning btn-sm mx-1" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button type="button" class="btn btn-danger btn-sm mx-1" data-toggle="modal" data-target="#delete{{ $key }}" title="Delete">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </div>

                                <!-- Modal Delete -->
                                <div class="modal fade" id="delete{{ $key }}" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <form action="{{ route('pj.destroy', ['id' => $data->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="modal-content">
                                                <div class="modal-header bg-danger text-white">
                                                    <h5 class="modal-title">Konfirmasi Hapus</h5>
                                                    <button type="button" class="close text-white" data-dismiss="modal"><span>&times;</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    Yakin ingin menghapus <strong>{{ $data->Nama }}</strong>?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7">Data tidak ditemukan</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Tombol Tambah & Print -->
            <div class="d-flex justify-content-between mt-3 no-print">
                <a href="{{ route('data.pj_petugas') }}" class="btn btn-secondary">&larr; Kembali</a>
                <div>
                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalAddPJ">
                        <i class="fas fa-plus"></i> Tambah Penanggung Jawab
                    </button>
                    <a href="javascript:window.print()" class="btn btn-info btn-sm">
                        <i class="fas fa-print"></i> Print
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="modalAddPJ" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form action="{{ route('pj.store') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header text-white" style="background-color: #0a1d44;">
                    <h5 class="modal-title">Tambah Penanggung Jawab</h5>
                    <button type="button" class="close text-white" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="Nama" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>No HP</label>
                        <input type="text" name="No_HP" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="Alamat" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>TPS</label>
                        <input type="text" name="TPS" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea name="Keterangan" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Style tambahan -->
<style>
    table th,
    table td {
        vertical-align: middle !important;
    }

    .table thead th {
        font-weight: 600;
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .card {
        border-radius: 10px;
        border: none;
    }

    .table {
        background-color: white;
    }

    .modal-content {
        border-radius: 10px;
    }
</style>

@endsection
