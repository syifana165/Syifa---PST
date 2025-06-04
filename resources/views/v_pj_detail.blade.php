@extends('layout.v_template')

@section('title', 'Detail Penanggung Jawab')

@section('content')
<div class="container">
    <h3 class="text-center mb-4" style="font-size: 2rem; font-weight: bold; color: #343a40;">Detail Penanggung Jawab</h3>

    <table class="table table-bordered" style="font-size: 1.2rem; color: #495057;">
        <tr>
            <th style="background-color: #f8f9fa; width: 200px;">Nama</th>
            <td>{{ $pj->Nama }}</td>
        </tr>
        <tr>
            <th style="background-color: #f8f9fa;">No HP</th>
            <td>{{ $pj->No_HP }}</td>
        </tr>
        <tr>
            <th style="background-color: #f8f9fa;">Alamat</th>
            <td>{{ $pj->Alamat }}</td>
        </tr>
        <tr>
            <th style="background-color: #f8f9fa;">TPS</th>
            <td>{{ $pj->TPS }}</td>
        </tr>
        <tr>
            <th style="background-color: #f8f9fa;">Keterangan</th>
            <td>{{ $pj->Keterangan }}</td>
        </tr>
    </table>

    <a href="{{ route('pj.index') }}" class="btn btn-secondary" style="font-size: 1.1rem;">Kembali</a>
</div>
@endsection
