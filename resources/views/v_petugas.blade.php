@extends('layout.v_template')

@section('title', 'Dashboard Petugas')

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
        left: 0; top: 0; width: 100%;
    }
    .no-print {
        display: none !important;
    }
</style>

<div class="container-fluid">

    <div class="row mb-4 no-print">
        <div class="col-md-4">
            <div class="card text-white shadow" style="background-color: #4caf50;">
                <!-- Statistik bisa ditambahkan -->
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">

        <!-- HEADER dengan judul dan search sejajar -->
        <div class="card-header py-3 no-print d-flex justify-content-between align-items-center" style="background-color: #4caf50;">
            <h3 class="card-title text-white m-0">Data Petugas</h3>

            <form action="{{ route('petugas.index') }}" method="GET" class="form-inline" style="max-width: 360px;">
                <div class="input-group input-group-sm shadow-sm rounded" style="overflow: hidden;">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-white border-right-0">
                            <i class="fas fa-search text-muted"></i>
                        </span>
                    </div>
                    <input
                        type="text"
                        name="search"
                        class="form-control border-left-0"
                        placeholder="Cari Nama....."
                        value="{{ request('search') }}"
                        autocomplete="off"
                        style="box-shadow: none;"
                    >
                    @if(request('search'))
                        <div class="input-group-append">
                            <a href="{{ route('petugas.index') }}" class="btn btn-outline-danger" title="Reset">
                                <i class="fas fa-times"></i>
                            </a>
                        </div>
                    @endif
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit" title="Cari">
                            Cari
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <div class="card-body">

            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show no-print" role="alert">
                <strong>Success!</strong> {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif

            <div id_petugas="print-area" class="table-responsive">
                <table id_petugas="example1" class="table table-bordered text-center">
                    <thead style="background-color: #4caf50; color: white;">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>No_HP</th>
                            <th>Alamat</th>
                            <th>Keterangan</th>
                            <th class="no-print">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($dataPetugas as $key => $data)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td class="text-left">{{ $data->Nama }}</td>
                            <td class="text-left">{{ $data->No_HP }}</td>
                            <td class="text-left">{{ $data->Alamat }}</td>
                            <td class="text-left">{{ $data->keterangan }}</td>
                            <td class="no-print">
                            <div class="d-flex justify-content-center gap-2">
                                <a href="{{ route('petugas.detail', ['id_petugas' => $data->id_petugas]) }}" class="btn btn-info btn-sm" title="Detail">
                                    <i class="fas fa-info-circle"></i>
                                </a>
                                <a href="{{ route('petugas.edit', ['id_petugas' => $data->id_petugas]) }}" class="btn btn-warning btn-sm" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{ $key }}" title="Delete">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </div>

    <!-- Modal Hapus -->
    <div class="modal fade no-print" id_petugas="delete{{ $key }}" tabindex="-1" role="dialog" aria-labelledby="modalDeleteLabel{{ $key }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ route('petugas.destroy', ['id_petugas' => $data->id_petugas]) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <div class="modal-content">
                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title" id_petugas="modalDeleteLabel{{ $key }}">Konfirmasi Hapus</h5>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Yakin ingin menghapus petugas <strong>{{ $data->Nama }}</strong>?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- End Modal -->
</td>

                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">Data tidak ditemukan.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-between mt-3 no-print">
                <a href="{{ route('data.pj_petugas') }}" class="btn btn-secondary">
                    &larr; Kembali
                </a>

                <div>
                    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalAddPetugas">
                        + Tambah Petugas
                    </button>

                    <a href="javascript:window.print()" class="btn btn-info btn-sm">
                        <i class="fas fa-print"></i> Print
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Modal Tambah Petugas -->
<div class="modal fade no-print" id_petugas="modalAddPetugas" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form action="{{ route('petugas.store') }}" method="POST">
            @csrf
            <div class="modal-content" style="background-color: #f0fff0;">
                <div class="modal-header text-white" style="background-color: #4caf50;">
                    <h5 class="modal-title">Tambah Petugas</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label>Nama</label>
                        <input type="text" name="Nama" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>No HP</label>
                        <input type="text" name="No_HP" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Alamat</label>
                        <textarea name="Alamat" class="form-control" required></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label>Keterangan</label>
                        <textarea name="keterangan" class="form-control"></textarea>
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

@endsection
