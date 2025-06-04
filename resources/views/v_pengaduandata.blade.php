@extends('layout.v_public')

@section('title', 'Data Pengaduan')

@section('content')
<h2 class="mb-4">Data Pengaduan</h2>

<table class="table table-bordered bg-white shadow-sm">
    <thead class="table-light">
        <tr>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Tanggal</th>
            <th>No HP</th>
            <th>Pengaduan</th>
            <th>Foto Pengaduan</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data_pengaduan as $pengaduan)
        <tr>
            <td>{{ $pengaduan->Nama }}</td>
            <td>{{ $pengaduan->Alamat }}</td>
            <td>{{ $pengaduan->Tanggal }}</td>
            <td>{{ $pengaduan->No_HP }}</td>
            <td>{{ $pengaduan->Pengaduan }}</td>
            <td>
                @if($pengaduan->Foto_Pengaduan)
                    <img src="{{ asset('foto_pengaduan/'.$pengaduan->Foto_Pengaduan) }}" alt="Foto" width="100">
                @else
                    Tidak ada foto
                @endif
            </td>
            <td>
                @php
                    $status = strtolower($pengaduan->status);
                    $badgeClass = match($status) {
                        'pengaduan' => 'bg-warning text-dark',
                        'sedang diproses' => 'bg-primary',
                        'selesai' => 'bg-success',
                        default => 'bg-secondary',
                    };
                @endphp
                <span class="badge {{ $badgeClass }}">{{ ucfirst($pengaduan->status) }}</span>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- Tombol kembali -->
<a href="{{ route('v_halaman') }}" class="btn btn-secondary mt-3">← Kembali</a>
@endsection
