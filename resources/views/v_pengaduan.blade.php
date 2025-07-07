@extends('layout.v_template')

@section('title', 'Dashboard Pengaduan')

@section('content')
<div class="container-fluid py-4">

    {{-- Statistik --}}
    <div class="row mb-4 g-4">
        <div class="col-md-6">
            <div class="card shadow-sm border rounded-4">
                <div class="card-body d-flex align-items-center">
                    <div class="me-3"><i class="fas fa-file-alt fa-3x text-muted"></i></div>
                    <div>
                        <h5 class="card-title mb-1 fw-bold">Total Pengaduan</h5>
                        <h3 class="display-6">{{ $totalPengaduan ?? 0 }}</h3>
                        <small class="text-muted">Seluruh pengaduan masuk</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow-sm border rounded-4">
                <div class="card-body d-flex align-items-center">
                    <div class="me-3"><i class="fas fa-check-circle fa-3x text-muted"></i></div>
                    <div>
                        <h5 class="card-title mb-1 fw-bold">Pengaduan Selesai</h5>
                        <h3 class="display-6">{{ $pengaduanSelesai ?? 0 }}</h3>
                        <small class="text-muted">Telah ditindaklanjuti</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Data Table --}}
    <div class="card shadow-sm border rounded-4">
        <div class="card-header bg-white text-dark rounded-top-4 d-flex justify-content-between align-items-center flex-wrap">
            <h3 class="m-0 fw-bold">Data Pengaduan</h3>
            <div style="width: 300px;">
                <input 
                    type="text" 
                    id="searchInput" 
                    class="form-control form-control-sm" 
                    placeholder="Cari Nama, Alamat, Status..."
                    onkeyup="filterTable()"
                >
            </div>
        </div>

        <div class="card-body p-0">
            @if(session('success'))
                <div class="alert alert-success m-3">{{ session('success') }}</div>
            @endif

            <div class="table-responsive" id="print-area">
                <table class="table table-bordered mb-0 text-center align-middle bg-white">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No HP</th>
                            <th>Tanggal</th>
                            <th>Pengaduan</th>
                            <th>Foto</th>
                            <th>Status</th>
                            <th class="no-print">Action</th>
                        </tr>
                    </thead>
                    <tbody id="dataTable">
                        @forelse($pengaduan as $key => $data)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td class="text-start">{{ $data->Nama }}</td>
                            <td class="text-start">{{ $data->Alamat }}</td>
                            <td class="text-start">{{ $data->No_HP }}</td>
                            <td>{{ \Carbon\Carbon::parse($data->Tanggal)->translatedFormat('d M Y') }}</td>
                            <td class="text-start">{{ Str::limit($data->Pengaduan,80) }}</td>
                            <td>
                                @if($data->Foto_Pengaduan)
                                    <img src="{{ asset('foto_pengaduan/'.$data->Foto_Pengaduan) }}" class="img-thumbnail" style="width:70px;height:70px;object-fit:cover;">
                                @else
                                    <span class="text-muted">Tidak ada</span>
                                @endif
                            </td>
                            <td>{{ $data->status }}</td>
                            <td class="no-print">
                                <a href="{{ route('pengaduan.detail', $data->id_pengaduan) }}" class="btn btn-outline-info btn-sm">
                                    <i class="fas fa-info-circle"></i>
                                </a>

                                @if(strtolower(auth()->user()->role) !== 'kepala bidang')
                                <form action="{{ route('pengaduan.ubahStatus', $data->id_pengaduan) }}" method="POST" class="mt-1">
                                    @csrf
                                    <select name="status" onchange="this.form.submit()" class="form-select form-select-sm">
                                        <option value="Pengaduan" {{ $data->status == 'Pengaduan' ? 'selected' : '' }}>Pengaduan</option>
                                        <option value="Sedang Proses" {{ $data->status == 'Sedang Proses' ? 'selected' : '' }}>Sedang Proses</option>
                                        <option value="Selesai" {{ $data->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                                    </select>
                                </form>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="9">Data pengaduan tidak ditemukan.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-end mt-3 p-3 no-print">
                <button onclick="window.print()" class="btn btn-outline-dark btn-sm">
                    <i class="fas fa-print"></i> Print
                </button>
            </div>
        </div>
    </div>
</div>

{{-- Filter Table Script --}}
<script>
function filterTable() {
    const input = document.getElementById('searchInput').value.toLowerCase();
    const rows = document.querySelectorAll('#dataTable tr');

    rows.forEach(row => {
        const nama = row.cells[1]?.innerText.toLowerCase() || '';
        const alamat = row.cells[2]?.innerText.toLowerCase() || '';
        const nohp = row.cells[3]?.innerText.toLowerCase() || '';
        const tanggal = row.cells[4]?.innerText.toLowerCase() || '';
        const pengaduan = row.cells[5]?.innerText.toLowerCase() || '';
        const status = row.cells[7]?.innerText.toLowerCase() || '';

        const cocok = nama.includes(input) || alamat.includes(input) || nohp.includes(input) || tanggal.includes(input) || pengaduan.includes(input) || status.includes(input);
        row.style.display = cocok ? '' : 'none';
    });
}
</script>
@endsection
