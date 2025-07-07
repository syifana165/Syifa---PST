@extends('layout.v_template')

@section('title', 'Data TIM')
@section('page', 'Halaman Data TIM')

@section('content')

<div class="container-fluid">
    <div class="card shadow-sm border rounded-4 mb-4">
        <div class="card-header bg-white text-dark border-bottom d-flex justify-content-between align-items-center">
            <h2 class="m-0 fw-bold">Daftar TIM</h2>

            @if(Auth::user()->level != 2)
            <a href="{{ route('tim.add') }}" class="btn btn-outline-primary btn-sm">
                <i class="fas fa-plus"></i> Tambah Tim
            </a>
            @endif
        </div>

        <div class="card-body">
            @if(session('success'))
            <div class="alert alert-success">
                <strong>Berhasil!</strong> {{ session('success') }}
            </div>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered align-middle text-center">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Kelompok Petugas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tim as $index => $t)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td class="text-start">{{ $t->Kelompok_Petugas }}</td>
                            <td>
                                <div class="d-flex justify-content-center gap-1 flex-wrap">
                                    <!-- Tombol Detail -->
                                    <a href="{{ route('tim.detail', $t->id_tim) }}" class="btn btn-outline-info btn-sm" title="Lihat Detail">
                                        <i class="fas fa-eye"></i>
                                    </a>

                                    @if(Auth::user()->level != 1)
                                        <!-- Tombol Edit -->
                                        <a href="{{ route('tim.edit', $t->id_tim) }}" class="btn btn-outline-warning btn-sm" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <!-- Tombol Hapus -->
                                        <form action="{{ route('tim.destroy', $t->id_tim) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-outline-danger btn-sm" title="Hapus">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @endforeach

                        @if($tim->isEmpty())
                        <tr>
                            <td colspan="3" class="text-muted">Tidak ada data tim.</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
