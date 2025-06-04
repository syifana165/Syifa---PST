@extends('layout.v_template')

@section('title', 'Dashboard Penugasan')

@section('content')

<style media="print">
    body * { visibility: hidden; }
    #print-area, #print-area * { visibility: visible; }
    #print-area { position: absolute; left: 0; top: 0; width: 100%; }
    .no-print { display: none !important; }
</style>

<div class="container-fluid">
    <div class="row mb-4 no-print">
        <div class="col-md-4">
            <div class="card text-white shadow" style="background-color: #4caf50;">
                {{-- Tambahkan statistik jika perlu --}}
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 no-print d-flex justify-content-between align-items-center" style="background-color: #4caf50;">
            <h3 class="card-title text-white m-0">Data Penugasan</h3>

            <form action="{{ route('penugasan.index') }}" method="GET" class="form-inline" style="max-width: 360px;">
                <div class="input-group input-group-sm shadow-sm rounded" style="overflow: hidden;">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-white border-right-0"><i class="fas fa-search text-muted"></i></span>
                    </div>
                    <input type="text" name="search" class="form-control border-left-0" placeholder="Cari Nama....." value="{{ request('search') }}" autocomplete="off" style="box-shadow: none;">
                    @if(request('search'))
                        <div class="input-group-append">
                            <a href="{{ route('penugasan.index') }}" class="btn btn-outline-danger" title="Reset">
                                <i class="fas fa-times"></i>
                            </a>
                        </div>
                    @endif
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit" title="Cari">Cari</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show no-print" role="alert">
                    <strong>Success!</strong> {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show no-print" role="alert">
                    <strong>Error!</strong> {{ session('error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
            @endif

            <div id="print-area" class="table-responsive">
                <table class="table table-bordered text-center">
                    <thead style="background-color: #4caf50; color: white;">
                        <tr>
                            <th>No</th>
                            <th>Nama Petugas</th>
                            <th>Tanggal</th>
                            <th>Lokasi Penugasan</th>
                            <th>Pengaduan</th>
                            <th>Kelompok Petugas</th>
                            <th>Status</th>
                            <th class="no-print">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $key => $d)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $d->petugas->Nama ?? '-' }}</td>
                                <td>{{ isset($d->pengaduan->Tanggal) ? \Carbon\Carbon::parse($d->pengaduan->Tanggal)->format('d-m-Y') : '-' }}</td>
                                <td>{{ $d->pengaduan->Alamat ?? '-' }}</td>
                                <td>{{ $d->pengaduan->Pengaduan ?? '-' }}</td>
                                <td>{{ $d->petugas->keterangan ?? '-' }}</td>
                                <td>{{ $d->pengaduan->status ?? '-' }}</td>
                                <td class="no-print">
                                    <form action="{{ route('penugasan.destroy', $d->id_penugasan) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus penugasan ini?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="7">Data tidak ditemukan.</td></tr>
                        @endforelse
                    </tbody>

                </table>
                {{ $data->links() }}
            </div>

            <div class="d-flex justify-content-between mt-3 no-print">
                <a href="{{ route('data.pj_petugas') }}" class="btn btn-secondary">&larr; Kembali</a>
                <div>
                    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalAddPenugasan">
                        + Tambah Penugasan
                    </button>
                    <a href="javascript:window.print()" class="btn btn-info btn-sm">
                        <i class="fas fa-print"></i> Print
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Tambah Penugasan -->
<div class="modal fade no-print" id="modalAddPenugasan" tabindex="-1" role="dialog" aria-labelledby="modalAddPenugasanLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('penugasan.store') }}" method="POST">
            @csrf
            <div class="modal-content" style="background-color: #f0fff0;">
                <div class="modal-header text-white" style="background-color: #4caf50;">
                    <h5 class="modal-title" id="modalAddPenugasanLabel">Tambah Penugasan</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <!-- Pilih Pengaduan -->
                    <div class="form-group">
                        <label for="id_pengaduan">Pilih Pengaduan</label>
                        <select name="id_pengaduan" id="id_pengaduan" class="form-control" required>
                            <option value="">-- Pilih Pengaduan --</option>
                            @foreach($pengaduan as $pd)
                                <option value="{{ $pd->id_pengaduan }}" data-pengaduan="{{ $pd->Pengaduan }}">
                                    {{ $pd->Nama }} - {{ \Carbon\Carbon::parse($pd->Tanggal)->format('d-m-Y') }} - {{ Str::limit($pd->Pengaduan, 50) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Pilih Petugas -->
                    <div class="form-group">
                        <label for="id_petugas">Pilih Petugas</label>
                        <select name="id_petugas" id="id_petugas" class="form-control" required>
                            <option value="">-- Pilih Petugas --</option>
                            @foreach($petugas as $pt)
                                <option value="{{ $pt->id_petugas }}">{{ $pt->Nama }}</option>
                            @endforeach
                        </select>
                        </div>
                            <div class="form-group mb-3">
                                <label>Kelompok Petugas</label>
                                <select name="kelompok_petugas" class="form-control" required>
                                    <option value="">-- Pilih Kelompok Petugas --</option>
                                    @foreach($petugas as $pt)
                                        <option value="{{ $pt->id_petugas }}">{{ $pt->keterangan }}</option>
                                    @endforeach
                                </select>
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
