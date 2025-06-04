@extends('layout.v_public')

@section('title', 'Data Penanggung Jawab')

@section('content')
<h2 class="mb-4">Data Penanggung Jawab</h2>

<table class="table table-bordered bg-white shadow-sm">
    <thead class="table-light">
        <tr>
            <th>Nama</th>
            <th>NO_HP</th>
            <th>Alamat</th>
            <th>TPS</th>
            <th>Keterangan</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data_pj as $pj)
        <tr>
            <td>{{ $pj->Nama }}</td>
            <td>{{ $pj->No_HP }}</td>
            <td>{{ $pj->Alamat }}</td>
            <td>{{ $pj->TPS }}</td>
            <td>{{ $pj->Keterangan }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- Tombol kembali di bawah tabel -->
<a href="{{ route('v_halaman') }}" class="btn btn-secondary mt-3">← Kembali</a>
@endsection
