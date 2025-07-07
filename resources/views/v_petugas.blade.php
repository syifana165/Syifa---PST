@extends('layout.v_template')

@section('title', 'Dashboard Petugas')

@section('content')

<style>
    .only-print {
        display: none;
    }

    @media print {
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

        .only-print {
            display: block !important;
        }
    }
</style>

<div class="container-fluid">

    <!-- Card -->
    <div class="card shadow mb-4">

        <!-- HEADER -->
        <div class="card-header py-3 no-print d-flex justify-content-between align-items-center" style="background-color: #0d47a1;">
            <h3 class="card-title text-white m-0">Data Petugas</h3>

            <form action="{{ route('petugas.index') }}" method="GET" class="form-inline" style="max-width: 360px;">
                <div class="input-group input-group-sm shadow-sm rounded" style="overflow: hidden;">
                    <input type="text" name="search" class="form-control" placeholder="Cari Nama....."
                        value="{{ request('search') }}" autocomplete="off">
                    @if(request('search'))
                        <div class="input-group-append">
                            <a href="{{ route('petugas.index') }}" class="btn btn-outline-danger" title="Reset">
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

        <!-- BODY -->
        <div class="card-body">

            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show no-print" role="alert">
                <strong>Success!</strong> {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif

            <!-- PRINT AREA -->
            <div id="print-area">

                <!-- KOP & SURAT PENUGASAN (hanya saat print) -->
                <div class="text-center mb-4 only-print">
                    <img src="{{ asset('assets/img/logo.jpg') }}" alt="Logo DLH" width="80">
                    <h5 style="margin: 0;">PEMERINTAH KABUPATEN SUBANG</h5>
                    <h5 style="margin: 0;">DINAS LINGKUNGAN HIDUP</h5>
                    <p style="margin: 0;">Jl. Raya Cigadung No. 17, Kabupaten Subang, Jawa Barat</p>
                    <hr style="border-top: 3px double #000;">
                    <h5 class="mt-4 mb-3"><u>SURAT KETERANGAN PENUGASAN</u></h5>
                    <p style="text-align: justify;">
                        Dengan ini, Dinas Lingkungan Hidup Kabupaten Subang menugaskan petugas berikut untuk melaksanakan kegiatan pengelolaan dan pemantauan Tempat Pembuangan Sementara (TPS) sesuai dengan tugas dan tanggung jawabnya.
                    </p>
                </div>

                <!-- TABEL -->
                <div class="table-responsive">
                    <table class="table table-bordered text-center">
                    <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>No HP</th>
                                <th>Alamat</th>
                                <th>Kelompok Petugas</th>
                                @auth
                                <th class="no-print">Aksi</th>
                                @endauth
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($dataPetugas as $key => $data)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td class="text-left">{{ $data->Nama }}</td>
                                <td class="text-left">{{ $data->No_HP }}</td>
                                <td class="text-left">{{ $data->Alamat }}</td>
                                <td>{{ $data->tim->Kelompok_Petugas ?? '-' }}</td>
                                @auth
                                <td class="no-print">
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('petugas.detail', ['id_petugas' => $data->id_petugas]) }}" class="btn btn-info btn-sm">
                                            <i class="fas fa-info-circle"></i>
                                        </a>
                                        <a href="{{ route('petugas.edit', ['id_petugas' => $data->id_petugas]) }}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{ $key }}">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </div>

                                    <!-- Modal Delete -->
                                    <div class="modal fade no-print" id="delete{{ $key }}" tabindex="-1" role="dialog">
                                        <div class="modal-dialog" role="document">
                                            <form action="{{ route('petugas.destroy', ['id_petugas' => $data->id_petugas]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div class="modal-content">
                                                    <div class="modal-header bg-danger text-white">
                                                        <h5 class="modal-title">Konfirmasi Hapus</h5>
                                                        <button type="button" class="close text-white" data-dismiss="modal">
                                                            <span>&times;</span>
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
                                </td>
                                @endauth
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6">Data tidak ditemukan.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- TANDA TANGAN (hanya saat print) -->
                <div class="mt-5 only-print">
                    <div class="d-flex justify-content-end">
                        <div class="text-center">
                            <p>Subang, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
                            <p><strong>Kepala Dinas Lingkungan Hidup</strong></p>
                            <br><br>
                            <p><u><strong>Drs. Nama Kepala Dinas</strong></u><br>NIP. 1960xxxxxxxxx</p>
                        </div>
                    </div>
                </div>

            </div>

            <!-- TOMBOL -->
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

<!-- MODAL TAMBAH -->
<div class="modal fade" id="modalAddPetugas" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form action="{{ route('petugas.store') }}" method="POST">
            @csrf
            <div class="modal-content" style="background-color: #f0fff0;">
                <div class="modal-header text-white" style="background-color: #0d47a1;">
                    <h5 class="modal-title">Tambah Petugas</h5>
                    <button type="button" class="close text-white" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>No HP</label>
                        <input type="text" name="no_hp" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="alamat" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="id_tim">Tim</label>
                        <select name="id_tim" class="form-control">
                            <option value="">-- Pilih Tim --</option>
                            @foreach($timList as $tim)
                                <option value="{{ $tim->id_tim }}">{{ $tim->Kelompok_Petugas }}</option>
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
