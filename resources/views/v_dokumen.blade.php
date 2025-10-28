@extends('layout.v_templatee')

@section('title', 'Kelola Dokumen')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

<style>
.text-purple { color: #6a0dad; }
.card { border-radius: 15px; overflow: hidden; }

/* Tombol gradasi ungu-biru konsisten */
.btn-gradient {
    background: linear-gradient(135deg, #8b5cf6, #6d28d9);
    color: #fff;
    font-weight: 600;
    border-radius: 12px;
    padding: 8px 20px;
    font-size: 15px;
    transition: all 0.3s ease;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 5px;
}

.btn-gradient:hover {
    background: linear-gradient(135deg, #a78bfa, #7c3aed);
    transform: scale(1.05);
    color: #fff;
}

.btn-warning, .btn-danger, .btn-info {
    border-radius: 12px;
    font-size: 13px;
    padding: 6px 12px;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-warning {
    background: #facc15;
    color: #3b3b3b;
}

.btn-warning:hover {
    background: #eab308;
    transform: scale(1.05);
}

.btn-danger {
    background: #e11d48;
    color: #fff;
}

.btn-danger:hover {
    background: #be123c;
    transform: scale(1.05);
}

.btn-info {
    background: #3b82f6;
    color: #fff;
}

.btn-info:hover {
    background: #2563eb;
    transform: scale(1.05);
}

.d-flex.gap-2 { gap: 10px; justify-content: center; }
</style>

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold text-purple mb-0">
            <i class="bi bi-collection"></i> Kelola Dokumen
        </h3>
        <a href="{{ route('dokumen.tambah') }}" class="btn btn-gradient">
            <i class="bi bi-plus-circle"></i> Tambah Dokumen
        </a>
    </div>

    {{-- FOTO --}}
    <h4 class="text-purple mt-4"><i class="bi bi-image"></i> Dokumentasi Foto</h4>
    <div class="row">
        @forelse ($foto as $item)
            <div class="col-md-3 mt-3">
                <div class="card shadow-sm text-center">
                    <div class="p-3 bg-light">
                        <img src="{{ asset('storage/' . $item->file_dokumen) }}"
                             alt="{{ $item->nama_dokumen }}" class="img-fluid rounded"
                             style="max-height: 180px; object-fit: cover;">
                    </div>
                    <div class="card-body">
                        <h6 class="fw-bold">{{ $item->nama_dokumen }}</h6>
                        <p>{{ $item->deskripsi ?? '-' }}</p>
                        <small class="text-muted d-block mb-2">
                            <i class="bi bi-calendar-event"></i>
                            {{ $item->tanggal_upload ? \Carbon\Carbon::parse($item->tanggal_upload)->translatedFormat('d M Y, H:i') : '-' }}
                        </small>
                        <div class="d-flex gap-2">
                            <a href="{{ route('dokumen.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <form action="{{ route('dokumen.destroy', $item->id) }}" method="POST">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i> Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-muted">Tidak ada foto.</p>
        @endforelse
    </div>

    {{-- VIDEO --}}
    <h4 class="text-purple mt-5"><i class="bi bi-camera-video"></i> Dokumentasi Video</h4>
    <div class="row">
        @forelse ($video as $item)
            <div class="col-md-4 mt-3">
                <div class="card shadow-sm text-center">
                    <div class="p-3 bg-light">
                        @php
                            $link = str_replace('watch?v=', 'embed/', $item->file_dokumen);
                            $link = str_replace('youtu.be/', 'youtube.com/embed/', $link);
                        @endphp
                        <iframe width="100%" height="180" src="{{ $link }}" frameborder="0" allowfullscreen></iframe>
                    </div>
                    <div class="card-body">
                        <h6 class="fw-bold">{{ $item->nama_dokumen }}</h6>
                        <p>{{ $item->deskripsi ?? '-' }}</p>
                        <small class="text-muted d-block mb-2">
                            <i class="bi bi-calendar-event"></i>
                            {{ $item->tanggal_upload ? \Carbon\Carbon::parse($item->tanggal_upload)->translatedFormat('d M Y, H:i') : '-' }}
                        </small>
                        <div class="d-flex gap-2">
                            <a href="{{ route('dokumen.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <form action="{{ route('dokumen.destroy', $item->id) }}" method="POST">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i> Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-muted">Tidak ada video.</p>
        @endforelse
    </div>

    {{-- PDF --}}
    <h4 class="text-purple mt-5"><i class="bi bi-file-earmark-pdf"></i> Dokumentasi PDF</h4>
    <div class="row">
        @forelse ($pdf as $item)
            <div class="col-md-3 mt-3">
                <div class="card shadow-sm text-center">
                    <div class="p-3 bg-light">
                        <iframe src="{{ asset('storage/' . $item->file_dokumen) }}" width="100%" height="180"></iframe>
                    </div>
                    <div class="card-body">
                        <h6 class="fw-bold">{{ $item->nama_dokumen }}</h6>
                        <p>{{ $item->deskripsi ?? '-' }}</p>
                        <small class="text-muted d-block mb-2">
                            <i class="bi bi-calendar-event"></i>
                            {{ $item->tanggal_upload ? \Carbon\Carbon::parse($item->tanggal_upload)->translatedFormat('d M Y, H:i') : '-' }}
                        </small>
                        <div class="d-flex gap-2 justify-content-center">
                            <a href="{{ asset('storage/' . $item->file_dokumen) }}" target="_blank" class="btn btn-info btn-sm">
                                <i class="bi bi-eye"></i> Lihat
                            </a>
                            <a href="{{ route('dokumen.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <form action="{{ route('dokumen.destroy', $item->id) }}" method="POST">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i> Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-muted">Tidak ada dokumen PDF.</p>
        @endforelse
    </div>
</div>
@endsection
