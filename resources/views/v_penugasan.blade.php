@extends('layout.v_template')

@section('title', 'Dashboard Penugasan')

@section('content')
<div class="container-fluid">
    <div class="card glass shadow-lg p-4 mb-4">
        <!-- Header dan Form Pencarian -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="text-success font-weight-bold">
                <i class="fas fa-clipboard-list"></i> Data Penugasan
            </h3>
            <form action="{{ route('penugasan.index') }}" method="GET" class="form-inline">
                <div class="input-group input-group-sm shadow-sm rounded">
                    <input type="text" name="search" class="form-control" placeholder="Cari Nama..." value="{{ request('search') }}">
                    @if(request('search'))
                        <div class="input-group-append">
                            <a href="{{ route('penugasan.index') }}" class="btn btn-outline-danger" title="Reset"><i class="fas fa-times"></i></a>
                        </div>
                    @endif
                    <div class="input-group-append">
                        <button class="btn btn-success" type="submit"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Notifikasi -->
        @foreach(['success', 'error'] as $msg)
            @if(session($msg))
                <div class="alert alert-{{ $msg == 'success' ? 'success' : 'danger' }} alert-dismissible fade show no-print" role="alert">
                    <strong>{{ ucfirst($msg) }}!</strong> {{ session($msg) }}
                    <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                </div>
            @endif
        @endforeach

        <!-- Tabel Penugasan -->
        <div id="print-area" class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Petugas</th>
                        <th>Tanggal</th>
                        <th>Lokasi</th>
                        <th>Pengaduan</th>
                        <th>Kelompok</th>
                        <th>Status</th>
                        <th class="no-print text-center" style="width: 150px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($data as $key => $d)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $d->petugas->Nama ?? '-' }}</td>
                            <td>{{ optional($d->pengaduan)->Tanggal ? \Carbon\Carbon::parse($d->pengaduan->Tanggal)->format('d-m-Y') : '-' }}</td>
                            <td>{{ $d->pengaduan->Alamat ?? '-' }}</td>
                            <td>{{ $d->pengaduan->Pengaduan ?? '-' }}</td>
                            <td>{{ $d->kelompok_petugas ?? '-' }}</td>
                            <td><span class="badge badge-info">{{ $d->pengaduan->status ?? '-' }}</span></td>
                            <td class="text-center no-print">
                                <a href="{{ route('penugasan.detail', $d->id_penugasan) }}" class="btn btn-info btn-sm mb-1" title="Detail">
                                    <i class="fas fa-eye"></i>
                                </a>
                                @if(Auth::user()->level != 1)
                                    <a href="{{ route('penugasan.edit', $d->id_penugasan) }}" class="btn btn-warning btn-sm mb-1" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('penugasan.destroy', $d->id_penugasan) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus penugasan ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted">Tidak ada data penugasan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $data->links() }}
        </div>

        <!-- Tombol Aksi -->
        <div class="d-flex justify-content-between mt-3 no-print">
            <a href="{{ route('data.pj_petugas') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
            <div>
                @if(Auth::user()->level != 1)
                <button class="btn btn-success btn-sm btn-glow" data-toggle="modal" data-target="#modalAddPenugasan">
                    + Tambah Penugasan
                </button>
                @endif
                <a href="javascript:window.print()" class="btn btn-info btn-sm">
                    <i class="fas fa-print"></i> Print
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Penugasan -->
@if(Auth::user()->level != 1)
<div class="modal fade no-print" id="modalAddPenugasan" tabindex="-1">
    <div class="modal-dialog">
        <form action="{{ route('penugasan.store') }}" method="POST">
            @csrf
            <div class="modal-content glass">
                <div class="modal-header bg-success text-white rounded-top">
                    <h5 class="modal-title">Tambah Penugasan</h5>
                    <button type="button" class="close text-white" data-dismiss="modal"><span>&times;</span></button>
                </div>

                <div class="modal-body">
                    <!-- Dropdown Pengaduan -->
                    <div class="form-group">
                        <label for="id_pengaduan">Pilih Pengaduan</label>
                        @if($pengaduanBelumDitugaskan->count())
                            <select name="id_pengaduan" class="form-control" required>
                                <option value="">-- Pilih Pengaduan --</option>
                                @foreach($pengaduanBelumDitugaskan as $p)
                                    <option value="{{ $p->id_pengaduan }}">{{ $p->Nama }}</option>
                                @endforeach
                            </select>
                        @else
                            <div class="alert alert-warning">Tidak ada pengaduan baru yang tersedia.</div>
                        @endif
                    </div>

                    <!-- Dropdown Petugas -->
                    <div class="form-group">
                        <label for="id_petugas">Pilih Petugas</label>
                        <select name="id_petugas" id="id_petugas" class="form-control" required>
                            <option value="">-- Pilih Petugas --</option>
                            @foreach($petugas as $pt)
                                <option 
                                    value="{{ $pt->id_petugas }}"
                                    data-kelompok="{{ $pt->tim->Kelompok_Petugas ?? '' }}">
                                    {{ $pt->Nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Input Kelompok Petugas (Otomatis) -->
                    <div class="form-group">
                        <label for="Kelompok_Petugas">Kelompok Petugas</label>
                        <input type="hidden" name="kelompok_petugas" id="Hidden_Kelompok_Petugas">
                        <input type="text" class="form-control" id="Kelompok_Petugas" readonly placeholder="Kelompok akan muncul otomatis">
                    </div>
                </div>

                <div class="modal-footer d-flex justify-content-between">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Batal</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endif

<!-- Script Toggle Mode -->
<script>
    document.querySelector('.toggle-mode')?.addEventListener('click', function () {
        document.body.classList.toggle('dark-mode');
        const icon = this.querySelector('i');
        icon.classList.toggle('fa-moon');
        icon.classList.toggle('fa-sun');
    });
</script>

<!-- Script Set Kelompok -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    const select = document.getElementById('id_petugas');
    select?.addEventListener('change', function () {
        const selectedOption = select.options[select.selectedIndex];
        const kelompok = selectedOption.getAttribute('data-kelompok') || '';
        document.getElementById('Kelompok_Petugas').value = kelompok;
        document.getElementById('Hidden_Kelompok_Petugas').value = kelompok;
    });
});
</script>

@endsection
